<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* base.html.twig */
class __TwigTemplate_eeca72d711e7543fc006ddf28f2edf11 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'styles' => [$this, 'block_styles'],
            'content' => [$this, 'block_content'],
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <link href=\"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/ticket-app/twig-app/assets/css/styles.css\">
    ";
        // line 9
        yield from $this->unwrap()->yieldBlock('styles', $context, $blocks);
        // line 10
        yield "</head>
<body class=\"bg-gray-50 min-h-screen flex flex-col\">
    <!-- Header -->
    <header class=\"bg-white shadow-sm\">
        <div class=\"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8\">
            <div class=\"flex justify-between h-16\">
                <div class=\"flex\">
                    <div class=\"flex-shrink-0 flex items-center\">
                        <a href=\"/ticket-app/twig-app/public/\" class=\"text-xl font-bold text-indigo-600\">TicketMaster</a>
                    </div>
                    <nav class=\"hidden sm:ml-6 sm:flex sm:space-x-8\">
                        ";
        // line 21
        if ((array_key_exists("user", $context) && ($context["user"] ?? null))) {
            // line 22
            yield "                            <a href=\"/ticket-app/twig-app/public/dashboard\" class=\"border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium\">
                                Dashboard
                            </a>
                            <a href=\"/ticket-app/twig-app/public/tickets\" class=\"border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium\">
                                Tickets
                            </a>
                        ";
        }
        // line 29
        yield "                    </nav>
                </div>
                <div class=\"hidden sm:ml-6 sm:flex sm:items-center\">
                    ";
        // line 32
        if ((array_key_exists("user", $context) && ($context["user"] ?? null))) {
            // line 33
            yield "                        <span class=\"text-gray-600 mr-4\">Welcome, ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "name", [], "any", false, false, false, 33), "html", null, true);
            yield "</span>
                        <a href=\"/ticket-app/twig-app/public/logout\" class=\"text-gray-600 hover:text-gray-900\">
                            Logout
                        </a>
                    ";
        } else {
            // line 38
            yield "                        <a href=\"/ticket-app/twig-app/public/login\" class=\"text-gray-600 hover:text-gray-900 mr-4\">
                            Login
                        </a>
                        <a href=\"/ticket-app/twig-app/public/signup\" class=\"bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700\">
                            Sign up
                        </a>
                    ";
        }
        // line 45
        yield "                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class=\"flex-grow\">
        ";
        // line 52
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 53
        yield "    </main>

    <!-- Footer -->
    <footer class=\"bg-white border-t border-gray-200 mt-8\">
        <div class=\"max-w-7xl mx-auto py-6 px-4 overflow-hidden sm:px-6 lg:px-8\">
            <p class=\"text-center text-base text-gray-500\">
                &copy; 2025 TicketMaster. All rights reserved.
            </p>
        </div>
    </footer>

    <!-- Toast Notifications -->
    <div id=\"toast\" class=\"hidden fixed top-4 right-4 p-4 rounded-lg shadow-lg bg-gray-800 text-white\">
        <div class=\"flex items-center\">
            <span id=\"toast-message\"></span>
            <button onclick=\"document.getElementById('toast').classList.add('hidden')\" class=\"ml-4\">
                &times;
            </button>
        </div>
    </div>

    <script src=\"/ticket-app/twig-app/assets/js/main.js\"></script>
    ";
        // line 75
        yield from $this->unwrap()->yieldBlock('scripts', $context, $blocks);
        // line 76
        yield "</body>
</html>
";
        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "TicketMaster";
        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_styles(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 52
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 75
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  185 => 75,  175 => 52,  165 => 9,  154 => 6,  147 => 76,  145 => 75,  121 => 53,  119 => 52,  110 => 45,  101 => 38,  92 => 33,  90 => 32,  85 => 29,  76 => 22,  74 => 21,  61 => 10,  59 => 9,  53 => 6,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}TicketMaster{% endblock %}</title>
    <link href=\"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/ticket-app/twig-app/assets/css/styles.css\">
    {% block styles %}{% endblock %}
</head>
<body class=\"bg-gray-50 min-h-screen flex flex-col\">
    <!-- Header -->
    <header class=\"bg-white shadow-sm\">
        <div class=\"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8\">
            <div class=\"flex justify-between h-16\">
                <div class=\"flex\">
                    <div class=\"flex-shrink-0 flex items-center\">
                        <a href=\"/ticket-app/twig-app/public/\" class=\"text-xl font-bold text-indigo-600\">TicketMaster</a>
                    </div>
                    <nav class=\"hidden sm:ml-6 sm:flex sm:space-x-8\">
                        {% if user is defined and user %}
                            <a href=\"/ticket-app/twig-app/public/dashboard\" class=\"border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium\">
                                Dashboard
                            </a>
                            <a href=\"/ticket-app/twig-app/public/tickets\" class=\"border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium\">
                                Tickets
                            </a>
                        {% endif %}
                    </nav>
                </div>
                <div class=\"hidden sm:ml-6 sm:flex sm:items-center\">
                    {% if user is defined and user %}
                        <span class=\"text-gray-600 mr-4\">Welcome, {{ user.name }}</span>
                        <a href=\"/ticket-app/twig-app/public/logout\" class=\"text-gray-600 hover:text-gray-900\">
                            Logout
                        </a>
                    {% else %}
                        <a href=\"/ticket-app/twig-app/public/login\" class=\"text-gray-600 hover:text-gray-900 mr-4\">
                            Login
                        </a>
                        <a href=\"/ticket-app/twig-app/public/signup\" class=\"bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700\">
                            Sign up
                        </a>
                    {% endif %}
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class=\"flex-grow\">
        {% block content %}{% endblock %}
    </main>

    <!-- Footer -->
    <footer class=\"bg-white border-t border-gray-200 mt-8\">
        <div class=\"max-w-7xl mx-auto py-6 px-4 overflow-hidden sm:px-6 lg:px-8\">
            <p class=\"text-center text-base text-gray-500\">
                &copy; 2025 TicketMaster. All rights reserved.
            </p>
        </div>
    </footer>

    <!-- Toast Notifications -->
    <div id=\"toast\" class=\"hidden fixed top-4 right-4 p-4 rounded-lg shadow-lg bg-gray-800 text-white\">
        <div class=\"flex items-center\">
            <span id=\"toast-message\"></span>
            <button onclick=\"document.getElementById('toast').classList.add('hidden')\" class=\"ml-4\">
                &times;
            </button>
        </div>
    </div>

    <script src=\"/ticket-app/twig-app/assets/js/main.js\"></script>
    {% block scripts %}{% endblock %}
</body>
</html>
", "base.html.twig", "C:\\Users\\USER\\Desktop\\eventease2_twig\\ticket-app\\twig-app\\templates\\base.html.twig");
    }
}
