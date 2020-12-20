<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* main/index.html.twig */
class __TwigTemplate_57ab7f4212957f3a5d9290557ce0d6e3bb0997a4bfd90f351adf416e588d8487 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html.twig", "main/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " ";
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    <section class=\"intro_section page_mainslider ds\">
        <div class=\"flexslider\" data-nav=\"false\">
            <ul class=\"slides\">
                <li style=\"width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;\" class=\"flex-active-slide\" data-thumb-alt=\"\">
                    <img src=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["slider"] ?? null), "html", null, true);
        echo "\" alt=\"Chicas, chicos Escort\" draggable=\"false\">
              
                    <div class=\"container\">
                        <div class=\"row\">
                            <div class=\"col-sm-12 text-right\">
                                <div class=\"slide_description_wrapper\">
                                    <div class=\"slide_description text-center\">
                                        <div class=\"intro-layer animated fadeInUp\" data-animation=\"fadeInUp\" style=\"visibility: hidden;\">
                                            <h3 class=\"text-uppercase\">
                                                Agencia online
                                            </h3>
                                        </div>
                                        <div class=\"intro-layer animated fadeInUp\" data-animation=\"fadeInUp\" style=\"visibility: hidden;\">
                                            <h1 class=\"text-uppercase big\">
                                                <a href=\"/\"> Chicas </a> / <a href=\"";
        // line 25
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("hombre_escort");
        echo "\">Chicos</a>  <br> Escort
                                            </h1>
                                        </div>
                                        <div class=\"intro-layer inline-content animated fadeInUp\" data-animation=\"fadeInUp\" style=\"visibility: hidden;\">
                                            ";
        // line 29
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 30
            echo "                                                <a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("ajustes");
            echo "\" class=\"theme_button color2\" class=\"sf-with\">Ajustes personales</a>
                                                ";
        } else {
            // line 32
            echo "                                            <a class=\"theme_button color2\" href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("registaracion");
            echo "\">Registrarse</a>
                                            <a class=\"theme_button inverse\"  href=\"";
            // line 33
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
            echo "\">Iniciar sesión</a>
                                            ";
        }
        // line 35
        echo "                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul><div class=\"container nav-container\"><ol class=\"flex-control-nav flex-control-paging\"></ol></div></div>
        <!-- eof flexslider -->
    </section>

    <section><!-- user cards -->
        <div class=\"container-fluid\">
           <div class=\"row\">
               <div style=\"text-align: center\" id=\"sex_content\"><!-- user.image|length and user.name|length and user.slugprovince|length and user.slug|length -->
                   ";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["pagination"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 51
            echo "                       ";
            if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "name", [], "any", false, false, false, 51)) && twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "slugprovince", [], "any", false, false, false, 51))) && twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "slug", [], "any", false, false, false, 51)))) {
                // line 52
                echo "                        <div class=\"onespam\">
                            <img src=\"";
                // line 53
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/image/"), "html", null, true);
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "image", [], "any", false, false, false, 53), "html", null, true);
                echo "\" alt=\"Escort ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "town", [], "any", false, false, false, 53), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "name", [], "any", false, false, false, 53), "html", null, true);
                echo "\">
                            <p class=\"nameuser\"><a class=\"user_a\" href=\"";
                // line 54
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show_only_user", ["province" => twig_get_attribute($this->env, $this->source, $context["user"], "slugprovince", [], "any", false, false, false, 54), "town" => twig_get_attribute($this->env, $this->source, $context["user"], "town", [], "any", false, false, false, 54), "user_slug" => twig_get_attribute($this->env, $this->source, $context["user"], "slug", [], "any", false, false, false, 54)]), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "name", [], "any", false, false, false, 54), "html", null, true);
                echo "</a></p>
                            <p class=\"town\"><a class=\"title_town\" href=\"";
                // line 55
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("town_escort", ["slugtown" => twig_get_attribute($this->env, $this->source, $context["user"], "townslug", [], "any", false, false, false, 55), "town" => twig_get_attribute($this->env, $this->source, $context["user"], "town", [], "any", false, false, false, 55)]), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "town", [], "any", false, false, false, 55), "html", null, true);
                echo "</a></p>
                        </div>
                       ";
            }
            // line 58
            echo "                   ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "               </div>
           </div>
        </div>
    </section>


    <div class=\"container\" style=\"margin-top: 44px\">
        <div class=\"row\">
            <div class=\"navigation\">
                ";
        // line 68
        echo $this->extensions['Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension']->render($this->env, ($context["pagination"] ?? null));
        echo "
            </div>
        </div>
    </div>


    <section id=\"contacts\" class=\"cs background_cover page_banner section_padding_top_65 section_padding_bottom_65\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-sm-12 text-center\">
                    <span class=\"small-text main_bg_color2\">24/7 ATENCIÓN</span>
                    <p class=\"big playfair topmargin_10\"><a target=\"_blank\" href=\"https://api.whatsapp.com/send?phone=+79003735869&text=escort69.live\">9003735869</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script>
        let sexContent = document.getElementById('sex_content');
        let aUser = sexContent.getElementsByTagName('a');
        let images = sexContent.getElementsByTagName('img');

         for(let i = 0; i < images.length; i++){
            let url = images[i];
            console.log(url.src);
            if(url.src == 'http://127.0.0.1:8000/image/'){
                images[i].src = 'http://127.0.0.1:8000/i/none.jpg';
            }
            if( url.src == 'https://www.escort69.live/image/'){
                images[i].src = 'https://escort69.live/i/none.jpg';
            }
        }

        let lengthUserA = aUser.length;

        for(let i = 0; i < lengthUserA; i++){
            let text = aUser[i].text.substring(0,15);
            aUser[i].innerHTML = text;
        }
    </script>


";
    }

    public function getTemplateName()
    {
        return "main/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 68,  166 => 59,  160 => 58,  152 => 55,  146 => 54,  137 => 53,  134 => 52,  131 => 51,  127 => 50,  110 => 35,  105 => 33,  100 => 32,  94 => 30,  92 => 29,  85 => 25,  68 => 11,  59 => 6,  55 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main/index.html.twig", "C:\\_works-vue-symfony\\symfony69\\public_html\\templates\\main\\index.html.twig");
    }
}
