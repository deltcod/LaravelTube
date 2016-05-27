
(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:App" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App.html">App</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Console" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Console.html">Console</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Console_Commands" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Console/Commands.html">Commands</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Console_Commands_Inspire" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Console/Commands/Inspire.html">Inspire</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Console_Kernel" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Console/Kernel.html">Kernel</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Events" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Events.html">Events</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Events_Event" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Events/Event.html">Event</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Exceptions" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Exceptions.html">Exceptions</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Exceptions_Handler" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Exceptions/Handler.html">Handler</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http.html">Http</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Http_Controllers" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Controllers.html">Controllers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Http_Controllers_Auth" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Controllers/Auth.html">Auth</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Controllers_Auth_AuthController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/AuthController.html">AuthController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Auth_PasswordController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/PasswordController.html">PasswordController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Auth_SocialAuthController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/SocialAuthController.html">SocialAuthController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Http_Controllers_ApiController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/ApiController.html">ApiController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Controller" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/Controller.html">Controller</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_HomeController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/HomeController.html">HomeController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_VideoController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/VideoController.html">VideoController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http_Middleware" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Middleware.html">Middleware</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Middleware_Authenticate" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/Authenticate.html">Authenticate</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_EncryptCookies" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/EncryptCookies.html">EncryptCookies</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_RedirectIfAuthenticated" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/RedirectIfAuthenticated.html">RedirectIfAuthenticated</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_VerifyCsrfToken" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/VerifyCsrfToken.html">VerifyCsrfToken</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http_Requests" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Requests.html">Requests</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Requests_Request" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Requests/Request.html">Request</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Http_Kernel" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Http/Kernel.html">Kernel</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Jobs" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Jobs.html">Jobs</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Jobs_Job" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Jobs/Job.html">Job</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Providers" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Providers.html">Providers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Providers_AppServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/AppServiceProvider.html">AppServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_AuthServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/AuthServiceProvider.html">AuthServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_EventServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/EventServiceProvider.html">EventServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_RouteServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/RouteServiceProvider.html">RouteServiceProvider</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Transformers" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Transformers.html">Transformers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Transformers_Transformer" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Transformers/Transformer.html">Transformer</a>                    </div>                </li>                            <li data-name="class:App_Transformers_VideoTransformer" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Transformers/VideoTransformer.html">VideoTransformer</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_OAuthIdentities" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/OAuthIdentities.html">OAuthIdentities</a>                    </div>                </li>                            <li data-name="class:App_OAuthIdentity" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/OAuthIdentity.html">OAuthIdentity</a>                    </div>                </li>                            <li data-name="class:App_User" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/User.html">User</a>                    </div>                </li>                            <li data-name="class:App_Video" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Video.html">Video</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "App.html", "name": "App", "doc": "Namespace App"},{"type": "Namespace", "link": "App/Console.html", "name": "App\\Console", "doc": "Namespace App\\Console"},{"type": "Namespace", "link": "App/Console/Commands.html", "name": "App\\Console\\Commands", "doc": "Namespace App\\Console\\Commands"},{"type": "Namespace", "link": "App/Events.html", "name": "App\\Events", "doc": "Namespace App\\Events"},{"type": "Namespace", "link": "App/Exceptions.html", "name": "App\\Exceptions", "doc": "Namespace App\\Exceptions"},{"type": "Namespace", "link": "App/Http.html", "name": "App\\Http", "doc": "Namespace App\\Http"},{"type": "Namespace", "link": "App/Http/Controllers.html", "name": "App\\Http\\Controllers", "doc": "Namespace App\\Http\\Controllers"},{"type": "Namespace", "link": "App/Http/Controllers/Auth.html", "name": "App\\Http\\Controllers\\Auth", "doc": "Namespace App\\Http\\Controllers\\Auth"},{"type": "Namespace", "link": "App/Http/Middleware.html", "name": "App\\Http\\Middleware", "doc": "Namespace App\\Http\\Middleware"},{"type": "Namespace", "link": "App/Http/Requests.html", "name": "App\\Http\\Requests", "doc": "Namespace App\\Http\\Requests"},{"type": "Namespace", "link": "App/Jobs.html", "name": "App\\Jobs", "doc": "Namespace App\\Jobs"},{"type": "Namespace", "link": "App/Providers.html", "name": "App\\Providers", "doc": "Namespace App\\Providers"},{"type": "Namespace", "link": "App/Repositories.html", "name": "App\\Repositories", "doc": "Namespace App\\Repositories"},{"type": "Namespace", "link": "App/Repositories/Contracts.html", "name": "App\\Repositories\\Contracts", "doc": "Namespace App\\Repositories\\Contracts"},{"type": "Namespace", "link": "App/Repositories/Eloquent.html", "name": "App\\Repositories\\Eloquent", "doc": "Namespace App\\Repositories\\Eloquent"},{"type": "Namespace", "link": "App/Repositories/Exceptions.html", "name": "App\\Repositories\\Exceptions", "doc": "Namespace App\\Repositories\\Exceptions"},{"type": "Namespace", "link": "App/Transformers.html", "name": "App\\Transformers", "doc": "Namespace App\\Transformers"},
            {"type": "Interface", "fromName": "App\\Repositories\\Contracts", "fromLink": "App/Repositories/Contracts.html", "link": "App/Repositories/Contracts/RepositoryInterface.html", "name": "App\\Repositories\\Contracts\\RepositoryInterface", "doc": "&quot;Interface RepositoryInterface&quot;"},
                                                        {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_all", "name": "App\\Repositories\\Contracts\\RepositoryInterface::all", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_allPaginated", "name": "App\\Repositories\\Contracts\\RepositoryInterface::allPaginated", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_search", "name": "App\\Repositories\\Contracts\\RepositoryInterface::search", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_searchPaginated", "name": "App\\Repositories\\Contracts\\RepositoryInterface::searchPaginated", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_create", "name": "App\\Repositories\\Contracts\\RepositoryInterface::create", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_update", "name": "App\\Repositories\\Contracts\\RepositoryInterface::update", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_updateFillable", "name": "App\\Repositories\\Contracts\\RepositoryInterface::updateFillable", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_delete", "name": "App\\Repositories\\Contracts\\RepositoryInterface::delete", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_findOrFail", "name": "App\\Repositories\\Contracts\\RepositoryInterface::findOrFail", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_findBy", "name": "App\\Repositories\\Contracts\\RepositoryInterface::findBy", "doc": "&quot;&quot;"},
            
            
            {"type": "Class", "fromName": "App\\Console\\Commands", "fromLink": "App/Console/Commands.html", "link": "App/Console/Commands/Inspire.html", "name": "App\\Console\\Commands\\Inspire", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Console\\Commands\\Inspire", "fromLink": "App/Console/Commands/Inspire.html", "link": "App/Console/Commands/Inspire.html#method_handle", "name": "App\\Console\\Commands\\Inspire::handle", "doc": "&quot;Execute the console command.&quot;"},
            
            {"type": "Class", "fromName": "App\\Console", "fromLink": "App/Console.html", "link": "App/Console/Kernel.html", "name": "App\\Console\\Kernel", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Events", "fromLink": "App/Events.html", "link": "App/Events/Event.html", "name": "App\\Events\\Event", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Events", "fromLink": "App/Events.html", "link": "App/Events/LikeDislikePush.html", "name": "App\\Events\\LikeDislikePush", "doc": "&quot;Class LikeDislikePush&quot;"},
                                                        {"type": "Method", "fromName": "App\\Events\\LikeDislikePush", "fromLink": "App/Events/LikeDislikePush.html", "link": "App/Events/LikeDislikePush.html#method___construct", "name": "App\\Events\\LikeDislikePush::__construct", "doc": "&quot;LikeDislikePush constructor.&quot;"},
                    {"type": "Method", "fromName": "App\\Events\\LikeDislikePush", "fromLink": "App/Events/LikeDislikePush.html", "link": "App/Events/LikeDislikePush.html#method_broadcastOn", "name": "App\\Events\\LikeDislikePush::broadcastOn", "doc": "&quot;Get the channels the event should be broadcast on.&quot;"},
            
            {"type": "Class", "fromName": "App\\Exceptions", "fromLink": "App/Exceptions.html", "link": "App/Exceptions/Handler.html", "name": "App\\Exceptions\\Handler", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Exceptions\\Handler", "fromLink": "App/Exceptions/Handler.html", "link": "App/Exceptions/Handler.html#method_report", "name": "App\\Exceptions\\Handler::report", "doc": "&quot;Report or log an exception.&quot;"},
                    {"type": "Method", "fromName": "App\\Exceptions\\Handler", "fromLink": "App/Exceptions/Handler.html", "link": "App/Exceptions/Handler.html#method_render", "name": "App\\Exceptions\\Handler::render", "doc": "&quot;Render an exception into an HTTP response.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/AnalyticsController.html", "name": "App\\Http\\Controllers\\AnalyticsController", "doc": "&quot;Class AnalyticsController&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\AnalyticsController", "fromLink": "App/Http/Controllers/AnalyticsController.html", "link": "App/Http/Controllers/AnalyticsController.html#method___construct", "name": "App\\Http\\Controllers\\AnalyticsController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\AnalyticsController", "fromLink": "App/Http/Controllers/AnalyticsController.html", "link": "App/Http/Controllers/AnalyticsController.html#method_likesDislikes", "name": "App\\Http\\Controllers\\AnalyticsController::likesDislikes", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/ApiController.html", "name": "App\\Http\\Controllers\\ApiController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\ApiController", "fromLink": "App/Http/Controllers/ApiController.html", "link": "App/Http/Controllers/ApiController.html#method_getStatusCode", "name": "App\\Http\\Controllers\\ApiController::getStatusCode", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ApiController", "fromLink": "App/Http/Controllers/ApiController.html", "link": "App/Http/Controllers/ApiController.html#method_setStatusCode", "name": "App\\Http\\Controllers\\ApiController::setStatusCode", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ApiController", "fromLink": "App/Http/Controllers/ApiController.html", "link": "App/Http/Controllers/ApiController.html#method_respondNotFound", "name": "App\\Http\\Controllers\\ApiController::respondNotFound", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ApiController", "fromLink": "App/Http/Controllers/ApiController.html", "link": "App/Http/Controllers/ApiController.html#method_respondInternalError", "name": "App\\Http\\Controllers\\ApiController::respondInternalError", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ApiController", "fromLink": "App/Http/Controllers/ApiController.html", "link": "App/Http/Controllers/ApiController.html#method_respond", "name": "App\\Http\\Controllers\\ApiController::respond", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ApiController", "fromLink": "App/Http/Controllers/ApiController.html", "link": "App/Http/Controllers/ApiController.html#method_respondWithError", "name": "App\\Http\\Controllers\\ApiController::respondWithError", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/AuthController.html", "name": "App\\Http\\Controllers\\Auth\\AuthController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\AuthController", "fromLink": "App/Http/Controllers/Auth/AuthController.html", "link": "App/Http/Controllers/Auth/AuthController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\AuthController::__construct", "doc": "&quot;Create a new authentication controller instance.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/PasswordController.html", "name": "App\\Http\\Controllers\\Auth\\PasswordController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\PasswordController", "fromLink": "App/Http/Controllers/Auth/PasswordController.html", "link": "App/Http/Controllers/Auth/PasswordController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\PasswordController::__construct", "doc": "&quot;Create a new password controller instance.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/SocialAuthController.html", "name": "App\\Http\\Controllers\\Auth\\SocialAuthController", "doc": "&quot;Class SocialAuthController&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\SocialAuthController", "fromLink": "App/Http/Controllers/Auth/SocialAuthController.html", "link": "App/Http/Controllers/Auth/SocialAuthController.html#method_redirectToAuthenticationServiceProvider", "name": "App\\Http\\Controllers\\Auth\\SocialAuthController::redirectToAuthenticationServiceProvider", "doc": "&quot;Redirect the user to the Provider authentication page.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\SocialAuthController", "fromLink": "App/Http/Controllers/Auth/SocialAuthController.html", "link": "App/Http/Controllers/Auth/SocialAuthController.html#method_handleAuthenticationServiceProviderCallback", "name": "App\\Http\\Controllers\\Auth\\SocialAuthController::handleAuthenticationServiceProviderCallback", "doc": "&quot;Obtain the user information from authentication service provider.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/Controller.html", "name": "App\\Http\\Controllers\\Controller", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/HomeController.html", "name": "App\\Http\\Controllers\\HomeController", "doc": "&quot;Class HomeController.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\HomeController", "fromLink": "App/Http/Controllers/HomeController.html", "link": "App/Http/Controllers/HomeController.html#method___construct", "name": "App\\Http\\Controllers\\HomeController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\HomeController", "fromLink": "App/Http/Controllers/HomeController.html", "link": "App/Http/Controllers/HomeController.html#method_index", "name": "App\\Http\\Controllers\\HomeController::index", "doc": "&quot;Show the application dashboard.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/LikeDislikeController.html", "name": "App\\Http\\Controllers\\LikeDislikeController", "doc": "&quot;Class LikeDislikeController&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\LikeDislikeController", "fromLink": "App/Http/Controllers/LikeDislikeController.html", "link": "App/Http/Controllers/LikeDislikeController.html#method___construct", "name": "App\\Http\\Controllers\\LikeDislikeController::__construct", "doc": "&quot;LikeDislikeController constructor.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\LikeDislikeController", "fromLink": "App/Http/Controllers/LikeDislikeController.html", "link": "App/Http/Controllers/LikeDislikeController.html#method_getLikes", "name": "App\\Http\\Controllers\\LikeDislikeController::getLikes", "doc": "&quot;Return likes&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\LikeDislikeController", "fromLink": "App/Http/Controllers/LikeDislikeController.html", "link": "App/Http/Controllers/LikeDislikeController.html#method_getLikesCount", "name": "App\\Http\\Controllers\\LikeDislikeController::getLikesCount", "doc": "&quot;Return likes count&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\LikeDislikeController", "fromLink": "App/Http/Controllers/LikeDislikeController.html", "link": "App/Http/Controllers/LikeDislikeController.html#method_getDislikes", "name": "App\\Http\\Controllers\\LikeDislikeController::getDislikes", "doc": "&quot;Return dislikes&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\LikeDislikeController", "fromLink": "App/Http/Controllers/LikeDislikeController.html", "link": "App/Http/Controllers/LikeDislikeController.html#method_getDislikesCount", "name": "App\\Http\\Controllers\\LikeDislikeController::getDislikesCount", "doc": "&quot;Return dislikes count&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\LikeDislikeController", "fromLink": "App/Http/Controllers/LikeDislikeController.html", "link": "App/Http/Controllers/LikeDislikeController.html#method_store", "name": "App\\Http\\Controllers\\LikeDislikeController::store", "doc": "&quot;Create and store like or dislike&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/MyVideosController.html", "name": "App\\Http\\Controllers\\MyVideosController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\MyVideosController", "fromLink": "App/Http/Controllers/MyVideosController.html", "link": "App/Http/Controllers/MyVideosController.html#method___construct", "name": "App\\Http\\Controllers\\MyVideosController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\MyVideosController", "fromLink": "App/Http/Controllers/MyVideosController.html", "link": "App/Http/Controllers/MyVideosController.html#method_index", "name": "App\\Http\\Controllers\\MyVideosController::index", "doc": "&quot;Show the application dashboard.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/ProfileController.html", "name": "App\\Http\\Controllers\\ProfileController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\ProfileController", "fromLink": "App/Http/Controllers/ProfileController.html", "link": "App/Http/Controllers/ProfileController.html#method___construct", "name": "App\\Http\\Controllers\\ProfileController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ProfileController", "fromLink": "App/Http/Controllers/ProfileController.html", "link": "App/Http/Controllers/ProfileController.html#method_index", "name": "App\\Http\\Controllers\\ProfileController::index", "doc": "&quot;Show the application dashboard.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/UploadController.html", "name": "App\\Http\\Controllers\\UploadController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\UploadController", "fromLink": "App/Http/Controllers/UploadController.html", "link": "App/Http/Controllers/UploadController.html#method___construct", "name": "App\\Http\\Controllers\\UploadController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\UploadController", "fromLink": "App/Http/Controllers/UploadController.html", "link": "App/Http/Controllers/UploadController.html#method_index", "name": "App\\Http\\Controllers\\UploadController::index", "doc": "&quot;Show the application dashboard.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/UserController.html", "name": "App\\Http\\Controllers\\UserController", "doc": "&quot;Class UserController&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\UserController", "fromLink": "App/Http/Controllers/UserController.html", "link": "App/Http/Controllers/UserController.html#method___construct", "name": "App\\Http\\Controllers\\UserController::__construct", "doc": "&quot;UserController constructor.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\UserController", "fromLink": "App/Http/Controllers/UserController.html", "link": "App/Http/Controllers/UserController.html#method_getAllUsers", "name": "App\\Http\\Controllers\\UserController::getAllUsers", "doc": "&quot;Get all users&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\UserController", "fromLink": "App/Http/Controllers/UserController.html", "link": "App/Http/Controllers/UserController.html#method_show", "name": "App\\Http\\Controllers\\UserController::show", "doc": "&quot;Get user find id&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\UserController", "fromLink": "App/Http/Controllers/UserController.html", "link": "App/Http/Controllers/UserController.html#method_update", "name": "App\\Http\\Controllers\\UserController::update", "doc": "&quot;Update user&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\UserController", "fromLink": "App/Http/Controllers/UserController.html", "link": "App/Http/Controllers/UserController.html#method_delete", "name": "App\\Http\\Controllers\\UserController::delete", "doc": "&quot;Delete user&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/VideoController.html", "name": "App\\Http\\Controllers\\VideoController", "doc": "&quot;Class VideoController.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\VideoController", "fromLink": "App/Http/Controllers/VideoController.html", "link": "App/Http/Controllers/VideoController.html#method___construct", "name": "App\\Http\\Controllers\\VideoController::__construct", "doc": "&quot;VideoController constructor.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\VideoController", "fromLink": "App/Http/Controllers/VideoController.html", "link": "App/Http/Controllers/VideoController.html#method_getAllVideos", "name": "App\\Http\\Controllers\\VideoController::getAllVideos", "doc": "&quot;Return all Videos.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\VideoController", "fromLink": "App/Http/Controllers/VideoController.html", "link": "App/Http/Controllers/VideoController.html#method_getBestVideos", "name": "App\\Http\\Controllers\\VideoController::getBestVideos", "doc": "&quot;Return the best Videos.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\VideoController", "fromLink": "App/Http/Controllers/VideoController.html", "link": "App/Http/Controllers/VideoController.html#method_getVideosUser", "name": "App\\Http\\Controllers\\VideoController::getVideosUser", "doc": "&quot;Return Videos only user.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\VideoController", "fromLink": "App/Http/Controllers/VideoController.html", "link": "App/Http/Controllers/VideoController.html#method_getVideosForCategory", "name": "App\\Http\\Controllers\\VideoController::getVideosForCategory", "doc": "&quot;Return Videos for Category.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\VideoController", "fromLink": "App/Http/Controllers/VideoController.html", "link": "App/Http/Controllers/VideoController.html#method_getVideosForSearch", "name": "App\\Http\\Controllers\\VideoController::getVideosForSearch", "doc": "&quot;Return Videos for Search.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\VideoController", "fromLink": "App/Http/Controllers/VideoController.html", "link": "App/Http/Controllers/VideoController.html#method_store", "name": "App\\Http\\Controllers\\VideoController::store", "doc": "&quot;Store a newly created video in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\VideoController", "fromLink": "App/Http/Controllers/VideoController.html", "link": "App/Http/Controllers/VideoController.html#method_show", "name": "App\\Http\\Controllers\\VideoController::show", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\VideoController", "fromLink": "App/Http/Controllers/VideoController.html", "link": "App/Http/Controllers/VideoController.html#method_update", "name": "App\\Http\\Controllers\\VideoController::update", "doc": "&quot;Update the specified video in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\VideoController", "fromLink": "App/Http/Controllers/VideoController.html", "link": "App/Http/Controllers/VideoController.html#method_destroy", "name": "App\\Http\\Controllers\\VideoController::destroy", "doc": "&quot;Remove the specified video from storage.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http", "fromLink": "App/Http.html", "link": "App/Http/Kernel.html", "name": "App\\Http\\Kernel", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/Authenticate.html", "name": "App\\Http\\Middleware\\Authenticate", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Middleware\\Authenticate", "fromLink": "App/Http/Middleware/Authenticate.html", "link": "App/Http/Middleware/Authenticate.html#method_handle", "name": "App\\Http\\Middleware\\Authenticate::handle", "doc": "&quot;Handle an incoming request.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/EncryptCookies.html", "name": "App\\Http\\Middleware\\EncryptCookies", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/RedirectIfAuthenticated.html", "name": "App\\Http\\Middleware\\RedirectIfAuthenticated", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Middleware\\RedirectIfAuthenticated", "fromLink": "App/Http/Middleware/RedirectIfAuthenticated.html", "link": "App/Http/Middleware/RedirectIfAuthenticated.html#method_handle", "name": "App\\Http\\Middleware\\RedirectIfAuthenticated::handle", "doc": "&quot;Handle an incoming request.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/VerifyCsrfToken.html", "name": "App\\Http\\Middleware\\VerifyCsrfToken", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Requests", "fromLink": "App/Http/Requests.html", "link": "App/Http/Requests/LikeDislikeStoreRequest.html", "name": "App\\Http\\Requests\\LikeDislikeStoreRequest", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Requests\\LikeDislikeStoreRequest", "fromLink": "App/Http/Requests/LikeDislikeStoreRequest.html", "link": "App/Http/Requests/LikeDislikeStoreRequest.html#method_authorize", "name": "App\\Http\\Requests\\LikeDislikeStoreRequest::authorize", "doc": "&quot;Determine if the user is authorized to make this request.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Requests\\LikeDislikeStoreRequest", "fromLink": "App/Http/Requests/LikeDislikeStoreRequest.html", "link": "App/Http/Requests/LikeDislikeStoreRequest.html#method_rules", "name": "App\\Http\\Requests\\LikeDislikeStoreRequest::rules", "doc": "&quot;Get the validation rules that apply to the request.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Requests", "fromLink": "App/Http/Requests.html", "link": "App/Http/Requests/Request.html", "name": "App\\Http\\Requests\\Request", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Requests", "fromLink": "App/Http/Requests.html", "link": "App/Http/Requests/UserUpdateRequest.html", "name": "App\\Http\\Requests\\UserUpdateRequest", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Requests\\UserUpdateRequest", "fromLink": "App/Http/Requests/UserUpdateRequest.html", "link": "App/Http/Requests/UserUpdateRequest.html#method_authorize", "name": "App\\Http\\Requests\\UserUpdateRequest::authorize", "doc": "&quot;Determine if the user is authorized to make this request.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Requests\\UserUpdateRequest", "fromLink": "App/Http/Requests/UserUpdateRequest.html", "link": "App/Http/Requests/UserUpdateRequest.html#method_rules", "name": "App\\Http\\Requests\\UserUpdateRequest::rules", "doc": "&quot;Get the validation rules that apply to the request.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Requests", "fromLink": "App/Http/Requests.html", "link": "App/Http/Requests/VideoUploadRequest.html", "name": "App\\Http\\Requests\\VideoUploadRequest", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Requests\\VideoUploadRequest", "fromLink": "App/Http/Requests/VideoUploadRequest.html", "link": "App/Http/Requests/VideoUploadRequest.html#method_authorize", "name": "App\\Http\\Requests\\VideoUploadRequest::authorize", "doc": "&quot;Determine if the user is authorized to make this request.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Requests\\VideoUploadRequest", "fromLink": "App/Http/Requests/VideoUploadRequest.html", "link": "App/Http/Requests/VideoUploadRequest.html#method_rules", "name": "App\\Http\\Requests\\VideoUploadRequest::rules", "doc": "&quot;Get the validation rules that apply to the request.&quot;"},
            
            {"type": "Class", "fromName": "App\\Jobs", "fromLink": "App/Jobs.html", "link": "App/Jobs/Job.html", "name": "App\\Jobs\\Job", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/LikeDislike.html", "name": "App\\LikeDislike", "doc": "&quot;Class LikeDislike&quot;"},
                                                        {"type": "Method", "fromName": "App\\LikeDislike", "fromLink": "App/LikeDislike.html", "link": "App/LikeDislike.html#method_user", "name": "App\\LikeDislike::user", "doc": "&quot;User relation&quot;"},
                    {"type": "Method", "fromName": "App\\LikeDislike", "fromLink": "App/LikeDislike.html", "link": "App/LikeDislike.html#method_video", "name": "App\\LikeDislike::video", "doc": "&quot;Video relation&quot;"},
                    {"type": "Method", "fromName": "App\\LikeDislike", "fromLink": "App/LikeDislike.html", "link": "App/LikeDislike.html#method_scopeLikes", "name": "App\\LikeDislike::scopeLikes", "doc": "&quot;Return all instances when type is likes&quot;"},
                    {"type": "Method", "fromName": "App\\LikeDislike", "fromLink": "App/LikeDislike.html", "link": "App/LikeDislike.html#method_scopeDislikes", "name": "App\\LikeDislike::scopeDislikes", "doc": "&quot;Return all instances when type is dislikes&quot;"},
            
            {"type": "Trait", "fromName": "App", "fromLink": "App.html", "link": "App/OAuthIdentities.html", "name": "App\\OAuthIdentities", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\OAuthIdentities", "fromLink": "App/OAuthIdentities.html", "link": "App/OAuthIdentities.html#method_oauthIdentities", "name": "App\\OAuthIdentities::oauthIdentities", "doc": "&quot;Get OAuth identities.&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/OAuthIdentity.html", "name": "App\\OAuthIdentity", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\OAuthIdentity", "fromLink": "App/OAuthIdentity.html", "link": "App/OAuthIdentity.html#method_configureTable", "name": "App\\OAuthIdentity::configureTable", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\OAuthIdentity", "fromLink": "App/OAuthIdentity.html", "link": "App/OAuthIdentity.html#method_getTable", "name": "App\\OAuthIdentity::getTable", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\OAuthIdentity", "fromLink": "App/OAuthIdentity.html", "link": "App/OAuthIdentity.html#method_user", "name": "App\\OAuthIdentity::user", "doc": "&quot;Get the user that owns the oauth identity.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/AppServiceProvider.html", "name": "App\\Providers\\AppServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\AppServiceProvider", "fromLink": "App/Providers/AppServiceProvider.html", "link": "App/Providers/AppServiceProvider.html#method_boot", "name": "App\\Providers\\AppServiceProvider::boot", "doc": "&quot;Bootstrap any application services.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\AppServiceProvider", "fromLink": "App/Providers/AppServiceProvider.html", "link": "App/Providers/AppServiceProvider.html#method_register", "name": "App\\Providers\\AppServiceProvider::register", "doc": "&quot;Register any application services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/AuthServiceProvider.html", "name": "App\\Providers\\AuthServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\AuthServiceProvider", "fromLink": "App/Providers/AuthServiceProvider.html", "link": "App/Providers/AuthServiceProvider.html#method_boot", "name": "App\\Providers\\AuthServiceProvider::boot", "doc": "&quot;Register any application authentication \/ authorization services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/EventServiceProvider.html", "name": "App\\Providers\\EventServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\EventServiceProvider", "fromLink": "App/Providers/EventServiceProvider.html", "link": "App/Providers/EventServiceProvider.html#method_boot", "name": "App\\Providers\\EventServiceProvider::boot", "doc": "&quot;Register any other events for your application.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/RouteServiceProvider.html", "name": "App\\Providers\\RouteServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_boot", "name": "App\\Providers\\RouteServiceProvider::boot", "doc": "&quot;Define your route model bindings, pattern filters, etc.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_map", "name": "App\\Providers\\RouteServiceProvider::map", "doc": "&quot;Define the routes for the application.&quot;"},
            
            {"type": "Class", "fromName": "App\\Repositories\\Contracts", "fromLink": "App/Repositories/Contracts.html", "link": "App/Repositories/Contracts/RepositoryInterface.html", "name": "App\\Repositories\\Contracts\\RepositoryInterface", "doc": "&quot;Interface RepositoryInterface&quot;"},
                                                        {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_all", "name": "App\\Repositories\\Contracts\\RepositoryInterface::all", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_allPaginated", "name": "App\\Repositories\\Contracts\\RepositoryInterface::allPaginated", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_search", "name": "App\\Repositories\\Contracts\\RepositoryInterface::search", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_searchPaginated", "name": "App\\Repositories\\Contracts\\RepositoryInterface::searchPaginated", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_create", "name": "App\\Repositories\\Contracts\\RepositoryInterface::create", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_update", "name": "App\\Repositories\\Contracts\\RepositoryInterface::update", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_updateFillable", "name": "App\\Repositories\\Contracts\\RepositoryInterface::updateFillable", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_delete", "name": "App\\Repositories\\Contracts\\RepositoryInterface::delete", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_findOrFail", "name": "App\\Repositories\\Contracts\\RepositoryInterface::findOrFail", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Contracts\\RepositoryInterface", "fromLink": "App/Repositories/Contracts/RepositoryInterface.html", "link": "App/Repositories/Contracts/RepositoryInterface.html#method_findBy", "name": "App\\Repositories\\Contracts\\RepositoryInterface::findBy", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Repositories\\Eloquent", "fromLink": "App/Repositories/Eloquent.html", "link": "App/Repositories/Eloquent/Repository.html", "name": "App\\Repositories\\Eloquent\\Repository", "doc": "&quot;Class Repository&quot;"},
                                                        {"type": "Method", "fromName": "App\\Repositories\\Eloquent\\Repository", "fromLink": "App/Repositories/Eloquent/Repository.html", "link": "App/Repositories/Eloquent/Repository.html#method___construct", "name": "App\\Repositories\\Eloquent\\Repository::__construct", "doc": "&quot;Repository constructor.&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Eloquent\\Repository", "fromLink": "App/Repositories/Eloquent/Repository.html", "link": "App/Repositories/Eloquent/Repository.html#method_model", "name": "App\\Repositories\\Eloquent\\Repository::model", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Eloquent\\Repository", "fromLink": "App/Repositories/Eloquent/Repository.html", "link": "App/Repositories/Eloquent/Repository.html#method_all", "name": "App\\Repositories\\Eloquent\\Repository::all", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Eloquent\\Repository", "fromLink": "App/Repositories/Eloquent/Repository.html", "link": "App/Repositories/Eloquent/Repository.html#method_allPaginated", "name": "App\\Repositories\\Eloquent\\Repository::allPaginated", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Eloquent\\Repository", "fromLink": "App/Repositories/Eloquent/Repository.html", "link": "App/Repositories/Eloquent/Repository.html#method_search", "name": "App\\Repositories\\Eloquent\\Repository::search", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Eloquent\\Repository", "fromLink": "App/Repositories/Eloquent/Repository.html", "link": "App/Repositories/Eloquent/Repository.html#method_searchPaginated", "name": "App\\Repositories\\Eloquent\\Repository::searchPaginated", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Eloquent\\Repository", "fromLink": "App/Repositories/Eloquent/Repository.html", "link": "App/Repositories/Eloquent/Repository.html#method_create", "name": "App\\Repositories\\Eloquent\\Repository::create", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Eloquent\\Repository", "fromLink": "App/Repositories/Eloquent/Repository.html", "link": "App/Repositories/Eloquent/Repository.html#method_update", "name": "App\\Repositories\\Eloquent\\Repository::update", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Eloquent\\Repository", "fromLink": "App/Repositories/Eloquent/Repository.html", "link": "App/Repositories/Eloquent/Repository.html#method_updateFillable", "name": "App\\Repositories\\Eloquent\\Repository::updateFillable", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Eloquent\\Repository", "fromLink": "App/Repositories/Eloquent/Repository.html", "link": "App/Repositories/Eloquent/Repository.html#method_delete", "name": "App\\Repositories\\Eloquent\\Repository::delete", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Eloquent\\Repository", "fromLink": "App/Repositories/Eloquent/Repository.html", "link": "App/Repositories/Eloquent/Repository.html#method_findOrFail", "name": "App\\Repositories\\Eloquent\\Repository::findOrFail", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Eloquent\\Repository", "fromLink": "App/Repositories/Eloquent/Repository.html", "link": "App/Repositories/Eloquent/Repository.html#method_findBy", "name": "App\\Repositories\\Eloquent\\Repository::findBy", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\Eloquent\\Repository", "fromLink": "App/Repositories/Eloquent/Repository.html", "link": "App/Repositories/Eloquent/Repository.html#method_makeModel", "name": "App\\Repositories\\Eloquent\\Repository::makeModel", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Repositories\\Exceptions", "fromLink": "App/Repositories/Exceptions.html", "link": "App/Repositories/Exceptions/RepositoryException.html", "name": "App\\Repositories\\Exceptions\\RepositoryException", "doc": "&quot;Class RepositoryException&quot;"},
                    
            {"type": "Class", "fromName": "App\\Repositories", "fromLink": "App/Repositories.html", "link": "App/Repositories/LikeDislikeRepository.html", "name": "App\\Repositories\\LikeDislikeRepository", "doc": "&quot;Class LikeDislikeRepository&quot;"},
                                                        {"type": "Method", "fromName": "App\\Repositories\\LikeDislikeRepository", "fromLink": "App/Repositories/LikeDislikeRepository.html", "link": "App/Repositories/LikeDislikeRepository.html#method_model", "name": "App\\Repositories\\LikeDislikeRepository::model", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\LikeDislikeRepository", "fromLink": "App/Repositories/LikeDislikeRepository.html", "link": "App/Repositories/LikeDislikeRepository.html#method_getLikesCount", "name": "App\\Repositories\\LikeDislikeRepository::getLikesCount", "doc": "&quot;Get likes count&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\LikeDislikeRepository", "fromLink": "App/Repositories/LikeDislikeRepository.html", "link": "App/Repositories/LikeDislikeRepository.html#method_getDislikesCount", "name": "App\\Repositories\\LikeDislikeRepository::getDislikesCount", "doc": "&quot;Get dislikes count&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\LikeDislikeRepository", "fromLink": "App/Repositories/LikeDislikeRepository.html", "link": "App/Repositories/LikeDislikeRepository.html#method_getLikesAll", "name": "App\\Repositories\\LikeDislikeRepository::getLikesAll", "doc": "&quot;Get likes all camps&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\LikeDislikeRepository", "fromLink": "App/Repositories/LikeDislikeRepository.html", "link": "App/Repositories/LikeDislikeRepository.html#method_getDislikesAll", "name": "App\\Repositories\\LikeDislikeRepository::getDislikesAll", "doc": "&quot;Get dislikes all camps&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\LikeDislikeRepository", "fromLink": "App/Repositories/LikeDislikeRepository.html", "link": "App/Repositories/LikeDislikeRepository.html#method_checkIfDataExists", "name": "App\\Repositories\\LikeDislikeRepository::checkIfDataExists", "doc": "&quot;Check if database contains data&quot;"},
            
            {"type": "Class", "fromName": "App\\Repositories", "fromLink": "App/Repositories.html", "link": "App/Repositories/UserRepository.html", "name": "App\\Repositories\\UserRepository", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Repositories\\UserRepository", "fromLink": "App/Repositories/UserRepository.html", "link": "App/Repositories/UserRepository.html#method_model", "name": "App\\Repositories\\UserRepository::model", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\UserRepository", "fromLink": "App/Repositories/UserRepository.html", "link": "App/Repositories/UserRepository.html#method_authenticated", "name": "App\\Repositories\\UserRepository::authenticated", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Repositories", "fromLink": "App/Repositories.html", "link": "App/Repositories/VideoRepository.html", "name": "App\\Repositories\\VideoRepository", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Repositories\\VideoRepository", "fromLink": "App/Repositories/VideoRepository.html", "link": "App/Repositories/VideoRepository.html#method_model", "name": "App\\Repositories\\VideoRepository::model", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\VideoRepository", "fromLink": "App/Repositories/VideoRepository.html", "link": "App/Repositories/VideoRepository.html#method_best", "name": "App\\Repositories\\VideoRepository::best", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Transformers", "fromLink": "App/Transformers.html", "link": "App/Transformers/LikeDislikeTransformer.html", "name": "App\\Transformers\\LikeDislikeTransformer", "doc": "&quot;Class LikeDislikeTransformer&quot;"},
                                                        {"type": "Method", "fromName": "App\\Transformers\\LikeDislikeTransformer", "fromLink": "App/Transformers/LikeDislikeTransformer.html", "link": "App/Transformers/LikeDislikeTransformer.html#method_transform", "name": "App\\Transformers\\LikeDislikeTransformer::transform", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Transformers", "fromLink": "App/Transformers.html", "link": "App/Transformers/Transformer.html", "name": "App\\Transformers\\Transformer", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Transformers\\Transformer", "fromLink": "App/Transformers/Transformer.html", "link": "App/Transformers/Transformer.html#method_transformCollection", "name": "App\\Transformers\\Transformer::transformCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Transformers\\Transformer", "fromLink": "App/Transformers/Transformer.html", "link": "App/Transformers/Transformer.html#method_transform", "name": "App\\Transformers\\Transformer::transform", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Transformers", "fromLink": "App/Transformers.html", "link": "App/Transformers/UserTransformer.html", "name": "App\\Transformers\\UserTransformer", "doc": "&quot;Class UserTransformer&quot;"},
                                                        {"type": "Method", "fromName": "App\\Transformers\\UserTransformer", "fromLink": "App/Transformers/UserTransformer.html", "link": "App/Transformers/UserTransformer.html#method_transform", "name": "App\\Transformers\\UserTransformer::transform", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Transformers", "fromLink": "App/Transformers.html", "link": "App/Transformers/VideoTransformer.html", "name": "App\\Transformers\\VideoTransformer", "doc": "&quot;Class VideoTransformer&quot;"},
                                                        {"type": "Method", "fromName": "App\\Transformers\\VideoTransformer", "fromLink": "App/Transformers/VideoTransformer.html", "link": "App/Transformers/VideoTransformer.html#method_transform", "name": "App\\Transformers\\VideoTransformer::transform", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/User.html", "name": "App\\User", "doc": "&quot;Class User&quot;"},
                                                        {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_getVideos", "name": "App\\User::getVideos", "doc": "&quot;Get videos&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_apiKey", "name": "App\\User::apiKey", "doc": "&quot;Get ApiKey&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_getLikes", "name": "App\\User::getLikes", "doc": "&quot;Get likes&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Video.html", "name": "App\\Video", "doc": "&quot;Class Video&quot;"},
                                                        {"type": "Method", "fromName": "App\\Video", "fromLink": "App/Video.html", "link": "App/Video.html#method_getUser", "name": "App\\Video::getUser", "doc": "&quot;Get User&quot;"},
                    {"type": "Method", "fromName": "App\\Video", "fromLink": "App/Video.html", "link": "App/Video.html#method_getLikesDislikes", "name": "App\\Video::getLikesDislikes", "doc": "&quot;Get likes\/Dislikes&quot;"},
                    {"type": "Method", "fromName": "App\\Video", "fromLink": "App/Video.html", "link": "App/Video.html#method_likes", "name": "App\\Video::likes", "doc": "&quot;Call scope likes&quot;"},
                    {"type": "Method", "fromName": "App\\Video", "fromLink": "App/Video.html", "link": "App/Video.html#method_dislikes", "name": "App\\Video::dislikes", "doc": "&quot;Call scope dislikes&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


