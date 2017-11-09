<?php
    class App {
        public function redirection($page = '', $vars = '', $externe = false) {
            //IF INTERNAL PAGE
            if (!empty($page) && !$externe) header('Location: ' . PUBLIC_URL . $page . EXT_URL . $vars);
            //IF EXTERNAL PAGE
            else if (!empty($page) && $externe) header('Location: ' . $page . $vars);
            else header('Location: ' . PUBLIC_URL . $vars);
            exit();
        }

        public function delete_notify() {
            if (isset($_SESSION['notification']))
                unset($_SESSION['notification']);
        }

        public function getMyMenus() {
            $menus = array();
            if(isset($_SESSION['user'])){
                $user = $_SESSION['user'];
                switch ($user['role']) {
                    case 'user':
                        $menus = unserialize(USER_MENU);
                        break;
                    case 'admin':
                        $menus = unserialize(ADMIN_MENU);
                        break;
                    case 'superadmin':
                        $menus = unserialize(SUPER_ADMIN_MENU);
                        
                        break;
                    default:
                        
                        break;
                }
            }
            return $menus;
        }
        /**
         * SET A NOTIFICATION
         *
         * @access public
         * @param mixed $type (default: null)
         * @param mixed $value (default: null)
         * @return void
         */
        public function set_notify($type = null, $value = null) {

            //DELETE OLD NOTIFICATION
            $this->delete_notify();

            if (isset($type) && isset($value)) {

                //SET NEW NOTIFICATION
                $_SESSION['notification']['type'] = $type;
                $_SESSION['notification']['code'] = $value;
            }
        }

        public function get_notify() {

            $value = false;

            //IF NOTIFY EXIST
            if (isset($_SESSION['notification']['type']) && isset($_SESSION['notification']['code'])) {
                $type = $_SESSION['notification']['type'];
                $code = $_SESSION['notification']['code'];

                //GET MESSAGE FROM CODE
                $value['message'] = $this->get_notify_text($type, $code);
                $value['type'] = $type;
                $value['code'] = $code;
            }
            //IF NO NOTIFICATION EXIST, SEARCH A SYSTEM NOTIFICATION
            // Code commented on 5th July by Gaurav to avoid notice of renewal as auto renewal is enabled now.
            // else if(isset($_SESSION['type'])){
            //	 global $connect;
            //	 $value['message'] = $connect->verify_account();
            //	 $value['type'] = 'warning';
            // }

            //DELETE NOTIFICATION
            $this->delete_notify();

            return $value;
        }

        public function get_notify_text($type = null, $code = null) {

            $value = false;

            //IF NOTIFICATION PARAMETERS EXIST
            if (isset($type) && isset($code)) {

                $notify_base = unserialize(TXT_NOTIFY);

                //IF NOTIFICATION EXIST
                if (!empty($notify_base[$type][$code])) $value = $notify_base[$type][$code];
            }

            return $value;
        }

        public function clear_sessions($auto_deco = false, $type = null) {


            //DELETE ALL SESSIONS
            session_destroy();

            //RESET SESSION
            session_start();

            //DECONNEXION
            $this->set_notify('success', 'disconnect');

            //REDIRECTION TO HOME PAGE

            $this->redirection('');

        }

        

    }

?>