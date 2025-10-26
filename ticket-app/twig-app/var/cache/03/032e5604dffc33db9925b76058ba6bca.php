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

/* home/index.html.twig */
class __TwigTemplate_96276abd34569118956895222a5596b4 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'styles' => [$this, 'block_styles'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Welcome to TicketMaster";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_styles(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "<style>
    .hero {
        position: relative;
        overflow: hidden;
    }
    
    .hero::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50px;
        background: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 100'%3E%3Cpath fill='%23f9fafb' fill-opacity='1' d='M0,64L80,58.7C160,53,320,43,480,48C640,53,800,75,960,69.3C1120,64,1280,32,1360,16L1440,0L1440,100L1360,100C1280,100,1120,100,960,100C800,100,640,100,480,100C320,100,160,100,80,100L0,100Z'%3E%3C/path%3E%3C/svg%3E\") no-repeat;
        background-size: 100% 100%;
        z-index: 1;
    }
    
    .decorative-circle {
        position: absolute;
        border-radius: 50%;
        background: rgba(99, 102, 241, 0.1);
        z-index: 0;
    }
    
    .circle-1 {
        width: 300px;
        height: 300px;
        top: -100px;
        right: -100px;
    }
    
    .feature-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
</style>
";
        yield from [];
    }

    // line 49
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 50
        yield "<!-- Hero Section with Wavy Background -->
<div class=\"hero bg-indigo-600 text-white py-20 relative\">
    <div class=\"decorative-circle circle-1\"></div>
    <div class=\"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10\">
        <h1 class=\"text-4xl md:text-6xl font-bold mb-6\">Manage Tickets with Ease</h1>
        <p class=\"text-xl md:text-2xl mb-8 max-w-3xl mx-auto\">A simple and intuitive ticket management system to track and resolve issues efficiently.</p>
        <div class=\"flex flex-col sm:flex-row justify-center gap-4\">
            <a href=\"/ticket-app/twig-app/public/signup\" class=\"bg-white text-indigo-600 px-8 py-3 rounded-md text-lg font-semibold hover:bg-gray-100 transition duration-300\">
                Get Started
            </a>
            <a href=\"#features\" class=\"bg-indigo-700 text-white px-8 py-3 rounded-md text-lg font-semibold hover:bg-indigo-800 transition duration-300\">
                Learn More
            </a>
        </div>
    </div>
</div>

<!-- Features Section -->
<div id=\"features\" class=\"py-16 bg-gray-50\">
    <div class=\"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8\">
        <h2 class=\"text-3xl font-bold text-center mb-12\">Powerful Features</h2>
        <div class=\"grid grid-cols-1 md:grid-cols-3 gap-8\">
            <!-- Feature 1 -->
            <div class=\"bg-white p-6 rounded-lg shadow-md feature-card\">
                <div class=\"w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4\">
                    <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"h-6 w-6 text-indigo-600\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2\" />
                    </svg>
                </div>
                <h3 class=\"text-xl font-semibold mb-2\">Easy Ticket Creation</h3>
                <p class=\"text-gray-600\">Quickly create tickets with all the necessary details to track issues and requests.</p>
            </div>
            
            <!-- Feature 2 -->
            <div class=\"bg-white p-6 rounded-lg shadow-md feature-card\">
                <div class=\"w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4\">
                    <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"h-6 w-6 text-indigo-600\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z\" />
                    </svg>
                </div>
                <h3 class=\"text-xl font-semibold mb-2\">Real-time Updates</h3>
                <p class=\"text-gray-600\">Stay informed with real-time updates on ticket status and progress.</p>
            </div>
            
            <!-- Feature 3 -->
            <div class=\"bg-white p-6 rounded-lg shadow-md feature-card\">
                <div class=\"w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4\">
                    <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"h-6 w-6 text-indigo-600\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z\" />
                    </svg>
                </div>
                <h3 class=\"text-xl font-semibold mb-2\">Time Tracking</h3>
                <p class=\"text-gray-600\">Monitor and manage time spent on each ticket for better productivity.</p>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class=\"bg-indigo-700 text-white py-16\">
    <div class=\"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center\">
        <h2 class=\"text-3xl font-bold mb-6\">Ready to get started?</h2>
        <p class=\"text-xl mb-8 max-w-3xl mx-auto\">Join thousands of teams who use TicketMaster to manage their tickets efficiently.</p>
        <a href=\"/ticket-app/twig-app/public/signup\" class=\"bg-white text-indigo-600 px-8 py-3 rounded-md text-lg font-semibold hover:bg-gray-100 transition duration-300 inline-block\">
            Create Free Account
        </a>
    </div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "home/index.html.twig";
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
        return array (  124 => 50,  117 => 49,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Welcome to TicketMaster{% endblock %}

{% block styles %}
<style>
    .hero {
        position: relative;
        overflow: hidden;
    }
    
    .hero::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50px;
        background: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 100'%3E%3Cpath fill='%23f9fafb' fill-opacity='1' d='M0,64L80,58.7C160,53,320,43,480,48C640,53,800,75,960,69.3C1120,64,1280,32,1360,16L1440,0L1440,100L1360,100C1280,100,1120,100,960,100C800,100,640,100,480,100C320,100,160,100,80,100L0,100Z'%3E%3C/path%3E%3C/svg%3E\") no-repeat;
        background-size: 100% 100%;
        z-index: 1;
    }
    
    .decorative-circle {
        position: absolute;
        border-radius: 50%;
        background: rgba(99, 102, 241, 0.1);
        z-index: 0;
    }
    
    .circle-1 {
        width: 300px;
        height: 300px;
        top: -100px;
        right: -100px;
    }
    
    .feature-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
</style>
{% endblock %}

{% block content %}
<!-- Hero Section with Wavy Background -->
<div class=\"hero bg-indigo-600 text-white py-20 relative\">
    <div class=\"decorative-circle circle-1\"></div>
    <div class=\"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10\">
        <h1 class=\"text-4xl md:text-6xl font-bold mb-6\">Manage Tickets with Ease</h1>
        <p class=\"text-xl md:text-2xl mb-8 max-w-3xl mx-auto\">A simple and intuitive ticket management system to track and resolve issues efficiently.</p>
        <div class=\"flex flex-col sm:flex-row justify-center gap-4\">
            <a href=\"/ticket-app/twig-app/public/signup\" class=\"bg-white text-indigo-600 px-8 py-3 rounded-md text-lg font-semibold hover:bg-gray-100 transition duration-300\">
                Get Started
            </a>
            <a href=\"#features\" class=\"bg-indigo-700 text-white px-8 py-3 rounded-md text-lg font-semibold hover:bg-indigo-800 transition duration-300\">
                Learn More
            </a>
        </div>
    </div>
</div>

<!-- Features Section -->
<div id=\"features\" class=\"py-16 bg-gray-50\">
    <div class=\"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8\">
        <h2 class=\"text-3xl font-bold text-center mb-12\">Powerful Features</h2>
        <div class=\"grid grid-cols-1 md:grid-cols-3 gap-8\">
            <!-- Feature 1 -->
            <div class=\"bg-white p-6 rounded-lg shadow-md feature-card\">
                <div class=\"w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4\">
                    <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"h-6 w-6 text-indigo-600\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2\" />
                    </svg>
                </div>
                <h3 class=\"text-xl font-semibold mb-2\">Easy Ticket Creation</h3>
                <p class=\"text-gray-600\">Quickly create tickets with all the necessary details to track issues and requests.</p>
            </div>
            
            <!-- Feature 2 -->
            <div class=\"bg-white p-6 rounded-lg shadow-md feature-card\">
                <div class=\"w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4\">
                    <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"h-6 w-6 text-indigo-600\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z\" />
                    </svg>
                </div>
                <h3 class=\"text-xl font-semibold mb-2\">Real-time Updates</h3>
                <p class=\"text-gray-600\">Stay informed with real-time updates on ticket status and progress.</p>
            </div>
            
            <!-- Feature 3 -->
            <div class=\"bg-white p-6 rounded-lg shadow-md feature-card\">
                <div class=\"w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4\">
                    <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"h-6 w-6 text-indigo-600\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z\" />
                    </svg>
                </div>
                <h3 class=\"text-xl font-semibold mb-2\">Time Tracking</h3>
                <p class=\"text-gray-600\">Monitor and manage time spent on each ticket for better productivity.</p>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class=\"bg-indigo-700 text-white py-16\">
    <div class=\"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center\">
        <h2 class=\"text-3xl font-bold mb-6\">Ready to get started?</h2>
        <p class=\"text-xl mb-8 max-w-3xl mx-auto\">Join thousands of teams who use TicketMaster to manage their tickets efficiently.</p>
        <a href=\"/ticket-app/twig-app/public/signup\" class=\"bg-white text-indigo-600 px-8 py-3 rounded-md text-lg font-semibold hover:bg-gray-100 transition duration-300 inline-block\">
            Create Free Account
        </a>
    </div>
</div>
{% endblock %}
", "home/index.html.twig", "C:\\Users\\USER\\Desktop\\eventease2_twig\\ticket-app\\twig-app\\templates\\home\\index.html.twig");
    }
}
