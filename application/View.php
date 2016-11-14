<?php
class View
{
   
    private $_controlador;
    private $_js;
    private $_css;
    public $area_r;
    public $area_l;
    public $menu;
    
    public function __construct(Request $peticion) {
        $this->_controlador = $peticion->getControlador();
        $this->_js = array();
        $this->_css = array();
        $this->area_l="visible";
         $this->area_r="visible";

		
    }
    
    public function renderizar($vista)
    {

        

            
        
        $js = array();
        
        if(count($this->_js)){
            $js = $this->_js;
        }
        $css = array();
        
        if(count($this->_css)){
            $css = $this->_css;
        }
        
        $_layoutParams = array(
            'ruta_css' => BASE_URL .'layout/'. DEFAULT_LAYOUT . '/css/',
            'ruta_img' => BASE_URL .'layout/'.  DEFAULT_LAYOUT . '/img/',
            'ruta_js' => BASE_URL  .'layout/'. DEFAULT_LAYOUT . '/js/',
            'menu' => $this->menu,
            'js' => $js,
            'css'=>$css
        );
        
        $rutaView = ROOT . 'site'.DS.'views' . DS . $this->_controlador . DS . $vista . '.phtml';
        $area_derecho=ROOT . 'layout' . DS . DEFAULT_LAYOUT . DS . 'areaR.php';
        $area_izquierda=ROOT . 'layout' . DS . DEFAULT_LAYOUT . DS . 'areaL.php';
        $config_layout=ROOT . 'layout' . DS . DEFAULT_LAYOUT . DS . 'config'.DS.'config_layout.php'; 
        $L=ROOT . 'layout' . DS . DEFAULT_LAYOUT . DS . 'config'.DS.'L.php';
        $R=ROOT . 'layout' . DS . DEFAULT_LAYOUT . DS . 'config'.DS.'R.php';
        $V=ROOT . 'layout' . DS . DEFAULT_LAYOUT . DS . 'config'.DS.'V.php';
        $fin=ROOT . 'layout' . DS . DEFAULT_LAYOUT . DS . 'config'.DS.'fin.php';

        if(is_readable($rutaView)){
            include_once $config_layout;
            include_once ROOT . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
            

            if($this->area_l!='visible'){
                    $AREA_L="0";
                }
            if($this->area_r!='visible'){
                    $AREA_R="0";
                }
                        


            if(is_readable($area_izquierda) && $AREA_L == '1' ){


            include_once $L; 
            include_once $area_izquierda;    
            include $fin; 
            
            }
            include_once $V; 
            include_once $rutaView;
            include $fin; 
            
            if (is_readable($area_derecho) && $AREA_R == '1') {
            include_once $R;  
            include_once $area_derecho;
            include_once $fin; 
            }
            include ROOT . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
        } 
        else {
            throw new Exception('Error de vista');
        }
    }
   
    
public function getMenu(){//debuelve un arreglo json con el menu echo para llamar $.post o $.get
$menu = array();
    if(Session::get('autenticado')){
        if(Session::get('level')=="Super Usuario")
        {

                $menu[] = array(
                'id' => 'publicacion',
                'titulo' => 'PUBLICAR',
                'enlace' => BASE_URL.'pb/',
                'img' => BASE_URL.'public/img/img_menu/user3.png'
                );
                $menu[] = array(
                'id' => 'msj',
                'titulo' => 'MENSAJES',
                'enlace' => BASE_URL.'msj/',
               
                );


        }
        if(Session::get('level')=="Usuario")
        {

                $menu[] = array(
                'id' => 'nosotros',
                'titulo' => 'NOSOTROS',
                'enlace' => BASE_URL.'nosotros',
                'img' => BASE_URL.'public/img/img_menu/user3.png'
                );

                 $menu[] = array(
                'id' => 'servicios',
                'titulo' => 'SERVICIOS',
                'enlace' => BASE_URL.'servicios',
                'img' => BASE_URL.'public/img/img_menu/user3.png'
                );

            
                 $menu[] = array(
                'id' => 'contactanos',
                'titulo' => 'CONTACTANOS',
                'enlace' => '#contact',
                'img' => ''
                );
                  
                
        }}else{

                $menu[] = array(
                'id' => 'nosotros',
                'titulo' => 'NOSOTROS',
                'enlace' => BASE_URL.'nosotros',
                'img' => BASE_URL.'public/img/img_menu/user3.png'
                );
                 $menu[] = array(
                'id' => 'servicios',
                'titulo' => 'SERVICIOS',
                'enlace' => BASE_URL.'servicios',
                'img' => BASE_URL.'public/img/img_menu/user3.png'
                );

                

                $menu[] = array(
                    'id' => 'registarme',
                    'titulo' => 'REGISTRO',
                    'enlace' => BASE_URL.'registro/',
                    'img' => BASE_URL.'public/img/img_menu/user3.png'
                );
                $menu[] = array(
                'id' => 'contactanos',
                'titulo' => 'CONTACTANOS',
                'enlace' => '#contact',
                'img' => ''
                );
            
           
        } 
echo json_encode($menu);
}

    public function setJs(array $js)
    {
        if(is_array($js) && count($js)){
            for($i=0; $i < count($js); $i++){
                $this->_js[] = BASE_URL . 'site/views/' . $this->_controlador . '/js/' . $js[$i] . '.js';
            }
        } else {
            throw new Exception('Error de js');
        }
    }
    public function setCss(array $css)
    {
        if(is_array($css) && count($css)){
            for($i=0; $i < count($css); $i++){
                $this->_css[] = BASE_URL . 'site/views/' . $this->_controlador . '/css/' . $css[$i] . '.css';
            }
        } else {
            throw new Exception('Error de css');
        }
    }
}

?>
