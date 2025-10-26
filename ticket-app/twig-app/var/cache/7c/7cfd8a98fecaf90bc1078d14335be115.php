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

/* auth/login.html.twig */
class __TwigTemplate_20efc41a7fe41c8589285154daa6bb29 extends Template
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
            'scripts' => [$this, 'block_scripts'],
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
        yield "Login - TicketMaster";
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
    .login-container {
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 0;
    }
    
    .login-card {
        width: 100%;
        max-width: 400px;
        background: white;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        padding: 2.5rem;
    }
    
    .form-input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        margin-bottom: 1rem;
    }
    
    .form-input:focus {
        outline: none;
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
    }
    
    .btn-primary {
        background-color: #4f46e5;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 0.375rem;
        font-weight: 500;
        width: 100%;
        transition: background-color 0.2s;
    }
    
    .btn-primary:hover {
        background-color: #4338ca;
    }
</style>
";
        yield from [];
    }

    // line 54
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 55
        yield "<div class=\"login-container\">
    <div class=\"login-card\">
        <div class=\"text-center mb-8\">
            <h1 class=\"text-2xl font-bold text-gray-900\">Welcome back</h1>
            <p class=\"mt-2 text-sm text-gray-600\">Sign in to your account</p>
        </div>
        
        <form action=\"/ticket-app/twig-app/public/login\" method=\"POST\">
            <div class=\"mb-4\">
                <label for=\"email\" class=\"block text-sm font-medium text-gray-700 mb-1\">Email address</label>
                <input type=\"email\" id=\"email\" name=\"email\" required 
                       class=\"form-input\" 
                       placeholder=\"you@example.com\">
            </div>
            
            <div class=\"mb-6\">
                <div class=\"flex justify-between items-center mb-1\">
                    <label for=\"password\" class=\"block text-sm font-medium text-gray-700\">Password</label>
                    <a href=\"#\" class=\"text-sm text-indigo-600 hover:text-indigo-500\">Forgot password?</a>
                </div>
                <input type=\"password\" id=\"password\" name=\"password\" required 
                       class=\"form-input\" 
                       placeholder=\"••••••••\">
            </div>
            
            <div class=\"mb-6\">
                <div class=\"flex items-center\">
                    <input id=\"remember-me\" name=\"remember-me\" type=\"checkbox\" class=\"h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded\">
                    <label for=\"remember-me\" class=\"ml-2 block text-sm text-gray-700\">
                        Remember me
                    </label>
                </div>
            </div>
            
            <button type=\"submit\" class=\"btn-primary\">
                Sign in
            </button>
            
            <div class=\"mt-4 text-center text-sm text-gray-600\">
                Don't have an account? 
                <a href=\"/ticket-app/twig-app/public/signup\" class=\"font-medium text-indigo-600 hover:text-indigo-500\">
                    Sign up
                </a>
            </div>
        </form>
    </div>
</div>
";
        yield from [];
    }

    // line 104
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 105
        yield "<script>
    // Simple form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        
        if (!email || !password) {
            e.preventDefault();
            showToast('Please fill in all fields');
        }
    });
    
    function showToast(message) {
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toast-message');
        
        toastMessage.textContent = message;
        toast.classList.remove('hidden');
        
        setTimeout(() => {
            toast.classList.add('hidden');
        }, 5000);
    }
</script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "auth/login.html.twig";
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
        return array (  189 => 105,  182 => 104,  130 => 55,  123 => 54,  72 => 6,  65 => 5,  54 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Login - TicketMaster{% endblock %}

{% block styles %}
<style>
    .login-container {
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 0;
    }
    
    .login-card {
        width: 100%;
        max-width: 400px;
        background: white;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        padding: 2.5rem;
    }
    
    .form-input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        margin-bottom: 1rem;
    }
    
    .form-input:focus {
        outline: none;
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
    }
    
    .btn-primary {
        background-color: #4f46e5;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 0.375rem;
        font-weight: 500;
        width: 100%;
        transition: background-color 0.2s;
    }
    
    .btn-primary:hover {
        background-color: #4338ca;
    }
</style>
{% endblock %}

{% block content %}
<div class=\"login-container\">
    <div class=\"login-card\">
        <div class=\"text-center mb-8\">
            <h1 class=\"text-2xl font-bold text-gray-900\">Welcome back</h1>
            <p class=\"mt-2 text-sm text-gray-600\">Sign in to your account</p>
        </div>
        
        <form action=\"/ticket-app/twig-app/public/login\" method=\"POST\">
            <div class=\"mb-4\">
                <label for=\"email\" class=\"block text-sm font-medium text-gray-700 mb-1\">Email address</label>
                <input type=\"email\" id=\"email\" name=\"email\" required 
                       class=\"form-input\" 
                       placeholder=\"you@example.com\">
            </div>
            
            <div class=\"mb-6\">
                <div class=\"flex justify-between items-center mb-1\">
                    <label for=\"password\" class=\"block text-sm font-medium text-gray-700\">Password</label>
                    <a href=\"#\" class=\"text-sm text-indigo-600 hover:text-indigo-500\">Forgot password?</a>
                </div>
                <input type=\"password\" id=\"password\" name=\"password\" required 
                       class=\"form-input\" 
                       placeholder=\"••••••••\">
            </div>
            
            <div class=\"mb-6\">
                <div class=\"flex items-center\">
                    <input id=\"remember-me\" name=\"remember-me\" type=\"checkbox\" class=\"h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded\">
                    <label for=\"remember-me\" class=\"ml-2 block text-sm text-gray-700\">
                        Remember me
                    </label>
                </div>
            </div>
            
            <button type=\"submit\" class=\"btn-primary\">
                Sign in
            </button>
            
            <div class=\"mt-4 text-center text-sm text-gray-600\">
                Don't have an account? 
                <a href=\"/ticket-app/twig-app/public/signup\" class=\"font-medium text-indigo-600 hover:text-indigo-500\">
                    Sign up
                </a>
            </div>
        </form>
    </div>
</div>
{% endblock %}

{% block scripts %}
<script>
    // Simple form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        
        if (!email || !password) {
            e.preventDefault();
            showToast('Please fill in all fields');
        }
    });
    
    function showToast(message) {
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toast-message');
        
        toastMessage.textContent = message;
        toast.classList.remove('hidden');
        
        setTimeout(() => {
            toast.classList.add('hidden');
        }, 5000);
    }
</script>
{% endblock %}
", "auth/login.html.twig", "C:\\Users\\USER\\Desktop\\eventease2_twig\\ticket-app\\twig-app\\templates\\auth\\login.html.twig");
    }
}
