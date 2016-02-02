<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_contact_form extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    
    public static function contact_form( $atts = null, $content = null ) {
        $atts = su_shortcode_atts(array(
            'style'              => 'default',
            'email'              => '',
            'name'               => 'yes',
            'subject'            => 'yes',
            'submit_button_text' => '',
            'label_show'         => '', // Dep 2.1.1
            'label'              => 'yes',
            'textarea_height'    => 120,
            'reset'              => 'yes',
            'margin'             => '',
            'scroll_reveal'      => '',
            'class'              => ''
        ), $atts, 'contact_form');

        $id     = uniqid('sucf');
        $config = JFactory::getConfig();
        $margin = ($atts['margin'] != '') ? 'margin: '. $atts['margin'] : ' margin: 0 0 25px 0';
        $return = array();
        $atts['label'] = ($atts['label_show']) ? $atts['label_show'] : $atts['label'];

        $js = ' sucf_name="'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_VALID_NAME').'";
                sucf_email="'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_VALID_EMAIL').'";
                sucf_vemail="'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_VALID_EMAIL_ADDRESS').'";
                sucf_subject="'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_VALID_SUBJECT').'";
                sucf_success="'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FORM_SUCCESS').'";
                sucf_error="'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FORM_ERROR').'";
                sucf_message="'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_VALID_MESSAGE').'";';
        
        suAsset::addFile('css', 'contact_form.css', __FUNCTION__);
        suAsset::addFile('css', 'note.css', 'note');
        suAsset::addFile('js', 'contact_form.js', __FUNCTION__);
        suAsset::addString('js', $js);

        $fields = "";
        if ($atts['name']=='yes' && $atts['subject']=='yes') {
            $fields .= 'name-email-subject';
        } elseif ($atts['name']=='yes') {
           $fields .= 'name-email';
        }  elseif ($atts['subject']=='yes') {
           $fields .= 'email-subject';
        } else {
            $fields .= 'email';
        }        
		$uri = JFactory::getURI();
		$absolute_url = $uri->toString();
        if (isset($_POST['email'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            $to = ($atts['email']) ? $atts['email'] :  $config->get( 'mailfrom' );

            $headers = "From: " . strip_tags($name) ."<". strip_tags($email) . ">\r\n";
            $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
            $headers .= 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";


            if(!empty($subject)){           
                $subject = $subject;
            } else {
                $subject =  $config->get( 'fromname' );
            }
            
            $fullmsg  = "<html><body>";
            $fullmsg .= "<table width='100%' valign='middle' border='0' cellspacing='0' cellpadding='0'>";
            $fullmsg .= "<tbody>";
            $fullmsg .= "<tr>";
            $fullmsg .= "<td border='0' cellspacing='0' cellpadding='0'>";
            $fullmsg .= "<table border='0' cellspacing='0' cellpadding='0' style='max-width: 768px;'>";
            $fullmsg .= "<tbody>";
            $fullmsg .= "<tr>";
            $fullmsg .= "<td>";
            $fullmsg .= nl2br($message);
            $fullmsg .= "<br><br>";
            $fullmsg .= $name . "<br>";
            $fullmsg .= $email;
            $fullmsg .= "</td>";
            $fullmsg .= "</tr>";
            $fullmsg .= "</tbody>";
            $fullmsg .= "</table>";
            $fullmsg .= "</td>";
            $fullmsg .= "</tr>";
            $fullmsg .= "</tbody>";
            $fullmsg .= "</table>";
            $fullmsg .= "</body></html>";

            if (!$email) {
                $erre = JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VALID_EMAIL');
            } elseif (!$message) {
                $errm = JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VALID_MESSAGE');
            } else {
                $email = trim($email);
                $_ename = "/^[-!#$%&\'*+\\.\/0-9=?A-Z^_'{|}~]+";
                $_host = "([0-9A-Z]+\.)+";
                $_tlds = "([0-9A-Z]){2,4}$/i";
                $mail_validate = FALSE;

                if (!preg_match($_ename . "@" . $_host . $_tlds, $email)) {
                    $mail_validate = TRUE;
                    $errev = JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VALID_EMAIL_ADDRESS');
                } else {

                    if (mail($to, $subject, $fullmsg, $headers)) {
                        echo 1;
                    } else
                        echo 1;
                    exit(0);
                }
            }
        }
        $return[] = '
        <div'.su_scroll_reveal($atts).' class="su-contact_form '.$fields . su_ecssc($atts) . '" style="'.$margin.'" id="'.$id.'">
            <div class="su-form-wrapper">                                
                <div class="su-form">
                    <div class="su-note su-note-style3">
                        <div class="su-note-inner su-clearfix"></div>
                    </div>
                <form name="contact_us_form" class="form-horizontal" action="' .$absolute_url . '" method="POST">
                    <div class="su-form-fields">
                        ';
                        if($atts['name']=='yes'){
                        $return[] ='
                            <div class="form-group">
                                ';
                                $return[] =' 
                                <div class="su-input-box">';
                                if ($atts['label']=='yes') { $return[] ='<label for="name'.$id.'" class="su-form-label">'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_NAME') .'</label>';}                    
                                    $return[] ='<input type="text" placeholder="'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PH_NAME') .'" class="form-control cf-name" name="name" id="name'.$id.'" />
                                </div>
                            </div>';
                        }
                        $return[] ='
                        <div class="form-group">
                            ';
                                               
                            $return[] ='                             
                            <div class="su-input-box">';
                            if ($atts['label']=='yes') {$return[] ='<label for="email'.$id.'" class="su-form-label">'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_EMAIL') .'</label>';} 

                                $return[] = '<input type="text" placeholder="'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PH_EMAIL') .'"  class="form-control cf-email" name="email" id="email'.$id.'" />
                            </div>
                        </div>';
                        if($atts['subject']=='yes'){
                        $return[] ='
                            <div class="form-group">
                                ';
                                $return[] =' 
                                
                                <div class="su-input-box">';
                                if ($atts['label']=='yes') {$return[] ='<label for="subject'.$id.'" class="su-form-label">'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_SUBJECT') .'</label>';}                    
                                    $return[] = '<input type="text" placeholder="'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PH_SUBJECT') .'"  class="form-control cf-subject" name="subject" id="subject'.$id.'">
                                </div>
                            </div>
                    ';
                    }
                    $return[] ='
                    </div>
                    <div class="su-form-common-field">
                        <div class="form-group ">
                            ';
                            $return[] ='                
                            <div class="su-input-box">';
                            if ($atts['label']=='yes') {$return[] ='<label for="message'.$id.'" class="su-form-label">'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_MESSAGE') .'</label>';}                    
                                $return[] ='<textarea placeholder="'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PH_MESSAGE') .'"  class="form-control cf-message" name="message" style="height: '.$atts['textarea_height'].'px;" id="message'.$id.'"></textarea>
                            </div>
                        </div>
                            <div class="form-group">
                                <div class=" submit-button">';
                                    if ($atts['submit_button_text']) {
                                        $return[] ='<input name="contact_us_submit" class="btn btn-primary" type="button" value="'. $atts['submit_button_text'] .'" />';}   
                                    else { 
                                        $return[] ='<input name="contact_us_submit" class="btn btn-primary" type="button" value="'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_SUBMIT') .'" />';}                 
                                   
                                    if($atts['reset']=='yes'){
                                        $return[] ='<input name="contact_us_reset" class="btn btn-warning" type="reset" value="'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_RESET') .'" />';
                                    }
                                    $return[] ='
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>';

        return implode('', $return);
    }


}
