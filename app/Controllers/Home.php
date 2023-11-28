<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Exception;

class Home extends BaseController
{
    /**
     * Function index screen
     * @return string
     */
    public function index(): string
    {
        //return view('welcome_message');

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];

        $base_uri = getenv('BASE_URI');

        $client = new Client(['base_uri' => $base_uri, 'timeout'  => 10]);

        try{
            $response_list_form_new_installation = $client->get('list-form-new-installation', ['headers' => $headers]);

            //$body_listform_new_installation = $response_list_form_new_installation->getBody()->getContents();
            //echo $body_list_form_new_installation;
            //$data = json_decode($body_list_form_new_installation);
            //var_dump($data);
            //exit();

            $body_list_form_new_installation = $response_list_form_new_installation->getBody()->getContents();
            $data = json_decode($body_list_form_new_installation);

            if($data->status == 200){
                $list_form_new_installation = $data->data;
            }else{
                $list_form_new_installation = [];
            }

            //Add files css
            $css_files  = [
                //Bootstrap Core Css
                base_url('assets/plugins/bootstrap/css/bootstrap.css'),
                //Waves Effect Css
                base_url('assets/plugins/node-waves/waves.css'),
                //Animation Css
                base_url('assets/plugins/animate-css/animate.css'),
                //Bootstrap Select Css
                base_url('assets/plugins/bootstrap-select/css/bootstrap-select.css'),
                //Custom Css
                base_url('assets/css/style.css'),
                //AdminBSB Themes. You can choose a theme from css/themes instead of get all themes
                base_url('assets/css/themes/all-themes.css')
            ];

            //Add files js
            $js_files  = [
                //Jquery Core Js
                base_url('assets/plugins/jquery/jquery.min.js'),
                //Bootstrap Core Js
                base_url('assets/plugins/bootstrap/js/bootstrap.js'),
                //Select Plugin Js
                base_url('assets/plugins/bootstrap-select/js/bootstrap-select.js'),
                //Slimscroll Plugin Js
                base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js'),
                //Jquery Validation Plugin Css
                base_url('assets/plugins/jquery-validation/jquery.validate.js'),
                base_url('assets/plugins/jquery-validation/localization/messages_es.js'),
                //Waves Effect Plugin Js
                base_url('assets/plugins/node-waves/waves.js'),
                //Custom Js
                base_url('assets/js/admin.js'),
                //Demo Js
                base_url('assets/js/demo.js'),
                base_url('assets/js/pages/forms/form-validation.js'),
                base_url('assets/js/home.js')
            ];

            $css_files = $this->resources->css($css_files);
            $js_files = $this->resources->js($js_files);

            $title = 'Rápido sin Riesgos';

            return view('index', compact('title', 'css_files', 'js_files', 'list_form_new_installation'));
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Function Download pdf Form New Installation
     * @return string
     * @throws GuzzleException
     */
    public function download_pdf_form_new_installation(): string
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];

        $body_array = array(
            'form_new_instalation_id' => $this->request->getPost('establishment'),
        );

        $base_uri = getenv('BASE_URI');

        $client = new Client(['base_uri' => $base_uri, 'timeout'  => 10]);
        try{
            $response_generate_form_new_installation = $client->post('generate-form-new-installation', ['headers' => $headers, 'body' => json_encode($body_array, JSON_FORCE_OBJECT)]);

            //$body_generate_form_new_installation = $response_generate_form_new_installation->getBody()->getContents();
            //echo $body_generate_form_new_installation;
            //$data = json_decode($body_generate_form_new_installation);
            //var_dump($data);
            //exit();

            return $response_generate_form_new_installation->getBody()->getContents();
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Function Download pdf Form New Installation
     * @return string
     * @throws GuzzleException
     */
    public function download_qr(): string
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];

        $body_array = array(
            'authorization_number' => substr($this->request->getPost('phone'), -4),
            'quantity' => $this->request->getPost('quantity'),
        );

        $base_uri = getenv('BASE_URI');

        $client = new Client(['base_uri' => $base_uri, 'timeout'  => 10]);
        try{
            $response_generate_qr = $client->post('generate-qr', ['headers' => $headers, 'body' => json_encode($body_array, JSON_FORCE_OBJECT)]);

            //$body_generate_qr = $response_generate_qr->getBody()->getContents();
            //echo $body_generate_qr;
            //$data = json_decode($body_generate_qr);
            //var_dump($data);
            //exit();

            return $response_generate_qr->getBody()->getContents();
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
