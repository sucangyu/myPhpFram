<?php

/* layout.php */
class __TwigTemplate_66ae9c1c4399f1d7dbe84f31e3d01aa35c0069ad19c95c7b3a82938df6d65096 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
\t<title>";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</title>
</head>
<body>
<header>头</header>
<content>
\t";
        // line 9
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "</content>
<footer>尾</footer>
</body>
</html>";
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "
\t";
    }

    public function getTemplateName()
    {
        return "layout.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 10,  42 => 9,  35 => 12,  33 => 9,  25 => 4,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
<head>
\t<title>{{ title }}</title>
</head>
<body>
<header>头</header>
<content>
\t{% block content %}

\t{% endblock %}
</content>
<footer>尾</footer>
</body>
</html>", "layout.php", "D:\\wampp\\htdocs\\myPhpFram\\app\\views\\layout.php");
    }
}
