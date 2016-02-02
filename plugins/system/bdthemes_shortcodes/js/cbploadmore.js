(function($, window, document, undefined) {
    'use strict';

    var CubePortfolio = $.fn.cubeportfolio.Constructor;

    function LoadMore(parent) {
        var t = this;

        t.parent = parent;

        t.loadMore = $(parent.options.loadMore).find('.cbp-l-loadMore-link');

        // load click or auto action
        if (parent.options.loadMoreAction.length) {
            t[parent.options.loadMoreAction]();
        }

    }

    LoadMore.prototype.click = function() {
        var t = this,
            numberOfClicks = 0;

        t.loadMore.on('click.cbp', function(e) {
            var item = $(this);

            e.preventDefault();

            if (item.hasClass('cbp-l-loadMore-stop')) {
                return;
            }

            // set loading status
            item.addClass('cbp-l-loadMore-loading');

            numberOfClicks++;
            var tid = item.data("id");
            
            // perform ajax request
            $.ajax({
                url: t.loadMore.attr('href'),
                data: tdata[tid],
                method: "POST",
                dataType: 'HTML'
            }).done(function(result) {
                var items, itemsNext;

                // find current container
                items = $(result).filter(function() {
                    return $(this).is('div' + '.cbp-loadMore-block' + numberOfClicks);
                });

                t.parent.$obj.cubeportfolio('appendItems', items.html(), function() {

                    // put the original message back
                    item.removeClass('cbp-l-loadMore-loading');

                    // check if we have more works
                    itemsNext = $(result).filter(function() {
                        return $(this).is('div' + '.cbp-loadMore-block' + (numberOfClicks + 1));
                    });

                    if (itemsNext.length === 0) {
                        item.addClass('cbp-l-loadMore-stop');
                    }
                });

            }).fail(function() {
                // error
            });

        });
    };


    LoadMore.prototype.auto = function() {
        var t = this;

        t.parent.$obj.on('initComplete.cbp', function() {
            Object.create({
                init: function() {
                    var self = this;

                    // the job inactive
                    self.isActive = false;

                    self.numberOfClicks = 0;

                    // set loading status
                    t.loadMore.addClass('cbp-l-loadMore-loading');

                    // cache window selector
                    self.window = $(window);

                    // add events for scroll
                    self.addEvents();

                    // trigger method on init
                    self.getNewItems();
                },

                addEvents: function() {
                    var self = this,
                        timeout;

                    t.loadMore.on('click.cbp', function(e) {
                        e.preventDefault();
                    });

                    self.window.on('scroll.loadMoreObject', function() {

                        clearTimeout(timeout);

                        timeout = setTimeout(function() {
                            if (!t.parent.isAnimating) {
                                // get new items on scroll
                                self.getNewItems();
                            }
                        }, 80);

                    });

                    // when the filter is completed
                    t.parent.$obj.on('filterComplete.cbp', function() {
                        self.getNewItems();
                    });
                },

                getNewItems: function() {
                    var self = this,
                        topLoadMore, topWindow;

                    if (self.isActive || t.loadMore.hasClass('cbp-l-loadMore-stop')) {
                        return;
                    }

                    topLoadMore = t.loadMore.offset().top;
                    topWindow = self.window.scrollTop() + self.window.height();

                    if (topLoadMore > topWindow) {
                        return;
                    }

                    // this job is now busy
                    self.isActive = true;

                    // increment number of clicks
                    self.numberOfClicks++;
                    var tid = t.loadMore.attr('data-id');
                    // perform ajax request
                    $.ajax({
                            url: t.loadMore.attr('href'),
                            data: tdata[tid],
                            method: "POST",
                            dataType: 'HTML',
                            cache: true
                        })
                        .done(function(result) {
                            var items, itemsNext;

                            // find current container
                            items = $(result).filter(function() {
                                return $(this).is('div' + '.cbp-loadMore-block' + self.numberOfClicks);
                            });

                            t.parent.$obj.cubeportfolio('appendItems', items.html(), function() {
                                // check if we have more works
                                itemsNext = $(result).filter(function() {
                                    return $(this).is('div' + '.cbp-loadMore-block' + (self.numberOfClicks + 1));
                                });

                                if (itemsNext.length === 0) {
                                    t.loadMore.addClass('cbp-l-loadMore-stop');

                                    // remove events
                                    self.window.off('scroll.loadMoreObject');
                                    t.parent.$obj.off('filterComplete.cbp');
                                } else {
                                    // make the job inactive
                                    self.isActive = false;

                                    self.window.trigger('scroll.loadMoreObject');
                                }
                            });
                        })
                        .fail(function() {
                            // make the job inactive
                            self.isActive = false;
                        });
                }
            }).init();
        });

    };


    LoadMore.prototype.destroy = function() {
        var t = this;

        t.loadMore.off('.cbp');

        $(window).off('scroll.loadMoreObject');
    };

    CubePortfolio.Plugins.LoadMore = function(parent) {

        if (parent.options.loadMore === '') {
            return null;
        }

        return new LoadMore(parent);
    };

})(jQuery, window, document);