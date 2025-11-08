<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The PaperMag News</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    <style>
        /* Custom styles for image blending in dark mode or specific effects */
        .dark .blend-bg {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .dark .text-dark-mode-soft {
            color: #d1d5db;
        }
    </style>
</head>

<body class="font-sans antialiased bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-200 min-h-full">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">

        <div class="flex justify-between items-center text-xs text-gray-500 dark:text-gray-400 border-b pb-3 mb-6">
            <div class="flex space-x-4">
                <span>November 26, 2023</span>
                <span>New York</span>
            </div>
            <div class="font-serif text-xl font-bold text-gray-900 dark:text-white">The PaperMag News</div>
            <div class="flex space-x-4">
                <span class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>Status</span>
                <span>Apps</span>
                <button class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Search
                </button>
            </div>
        </div>

        <nav class="flex justify-between items-center border-b pb-4 mb-8">
            <ul class="flex space-x-6 text-sm font-medium">
                <li><a href="#" class="hover:text-red-600 dark:hover:text-red-400">Home</a></li>
                <li><a href="#" class="hover:text-red-600 dark:hover:text-red-400">World</a></li>
                <li><a href="#" class="hover:text-red-600 dark:hover:text-red-400">Covid19</a></li>
                <li><a href="#" class="hover:text-red-600 dark:hover:text-red-400">Election</a></li>
                <li><a href="#" class="hover:text-red-600 dark:hover:text-red-400">News</a></li>
                <li><a href="#" class="hover:text-red-600 dark:hover:text-red-400">Politics</a></li>
                <li><a href="#" class="hover:text-red-600 dark:hover:text-red-400">Business</a></li>
            </ul>
            @if (Route::has('login'))
                <div class="flex space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="text-sm text-gray-700 dark:text-white/80 hover:text-red-600 dark:hover:text-red-400">Dashboard</a>
                    @else
                        <button id="open-modal"
                            class="text-sm text-gray-700 dark:text-white/80 hover:text-red-600 dark:hover:text-red-400">Login</button>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="text-sm text-red-600 dark:text-red-400 hover:underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </nav>

        <section class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="md:col-span-2 bg-gray-50 dark:bg-gray-800 p-6 rounded-lg shadow-sm flex flex-col justify-between">
                <div>
                    <span class="text-sm text-gray-500 dark:text-gray-400">POLITICS</span>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mt-2 mb-4 leading-tight">CFIF Leads Coalition Urging Congress to Support the Save Local Business Act</h2>
                    <p class="text-gray-700 dark:text-gray-300 text-base mb-4">In a letter sent this week, a coalition of more than two dozen prominent free market organizations and the millions of members...</p>
                </div>
                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400 mt-4">
                    <img src="https://via.placeholder.com/30" alt="Author" class="w-8 h-8 rounded-full mr-3">
                    <div>
                        <span class="font-semibold">Alex H. Hiller</span>
                        <span class="mx-2">•</span>
                        <span>26 September 2023</span>
                    </div>
                </div>
            </div>

            <div class="md:col-span-1 rounded-lg overflow-hidden relative">
                <img src="https://images.unsplash.com/photo-1549925243-71822c2a056a?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwyMHx8Y29uZ3Jlc3MlMjBidWlsZGluZ3xlbnwwfHx8fDE3MDAxNjk1OTF8MA&ixlib=rb-4.0.3&q=80&w=1080"
                    alt="Congress Building" class="w-full h-full object-cover rounded-lg">
            </div>
        </section>

        <section class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="md:col-span-2">
                <h3 class="text-xl font-bold border-b pb-2 mb-6 text-gray-900 dark:text-white">Recently Added</h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" id="recent-news-container">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transition transform hover:scale-105 duration-300 ease-in-out">
                        <img src="https://images.unsplash.com/photo-1599305090159-869389a425f7?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwyfHxwcm90ZXN0JTIwd29tZW58ZW5wwfHx8fDE3MTA1MDY0NjJ8MA&ixlib=rb-4.0.3&q=80&w=1080" alt="Protest" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <span class="text-xs text-gray-500 dark:text-gray-400">POLITICS</span>
                            <h4 class="font-bold text-lg mt-1 mb-2 text-gray-900 dark:text-white line-clamp-2">Under longton court proceed and Nation Labor Relations</h4>
                            <div class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                                <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg> 5.2K</span>
                                <span class="mx-2">•</span>
                                <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.88 8.88 0 01-4.706-1.385l-.578.47C3.12 16.63 2 17 2 17s-.643-1.077.388-2.618l.295-.445A8.09 8.09 0 012 10c0-3.866 3.582-7 8-7s8 3.134 8 7z" clip-rule="evenodd"/></svg> 243</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transition transform hover:scale-105 duration-300 ease-in-out">
                        <img src="https://images.unsplash.com/photo-1543874052-8706d3d758f5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxNXx8bWFyY2glMjBmb3IlMjBsaXZlc3xlbnwwfHx8fDE3MTA1MDY0NjN8MA&ixlib=rb-4.0.3&q=80&w=1080" alt="March for Lives" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <span class="text-xs text-gray-500 dark:text-gray-400">POLITICS</span>
                            <h4 class="font-bold text-lg mt-1 mb-2 text-gray-900 dark:text-white line-clamp-2">China hands out at least twice as much development money as the US and more</h4>
                            <div class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                                <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg> 1.2K</span>
                                <span class="mx-2">•</span>
                                <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.88 8.88 0 01-4.706-1.385l-.578.47C3.12 16.63 2 17 2 17s-.643-1.077.388-2.618l.295-.445A8.09 8.09 0 012 10c0-3.866 3.582-7 8-7s8 3.134 8 7z" clip-rule="evenodd"/></svg> 270</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:col-span-1">
                <h3 class="text-xl font-bold border-b pb-2 mb-6 text-gray-900 dark:text-white">Trending</h3>
                <div class="space-y-6" id="trending-news-container">
                    <div class="flex items-center">
                        <img src="https://images.unsplash.com/photo-1559825442-9989b524795b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwyMHx8c2F2aW5nJTIwYmFua3xlbnwwfHx8fDE3MTA1MDY0NjV8MA&ixlib=rb-4.0.3&q=80&w=1080" alt="Bank" class="w-20 h-20 object-cover rounded-lg mr-4">
                        <div>
                            <span class="text-xs text-gray-500 dark:text-gray-400">BUSINESS</span>
                            <h4 class="font-semibold text-gray-900 dark:text-white leading-tight mt-1 line-clamp-2">The brutal prison fight first broke out on</h4>
                            <div class="flex items-center text-xs text-gray-600 dark:text-gray-400 mt-1">
                                <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg> 3.2K</span>
                                <span class="mx-2">•</span>
                                <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.88 8.88 0 01-4.706-1.385l-.578.47C3.12 16.63 2 17 2 17s-.643-1.077.388-2.618l.295-.445A8.09 8.09 0 012 10c0-3.866 3.582-7 8-7s8 3.134 8 7z" clip-rule="evenodd"/></svg> 542</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <img src="https://images.unsplash.com/photo-1544498522-bb79854b706c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxOHx8ZXVhZG9yJTIwcG9saWNlJTIwc3Rvcm18ZW5wwfHx8fDE3MTA1MDY0NjV8MA&ixlib=rb-4.0.3&q=80&w=1080" alt="Ecuador Police" class="w-20 h-20 object-cover rounded-lg mr-4">
                        <div>
                            <span class="text-xs text-gray-500 dark:text-gray-400">WORLD</span>
                            <h4 class="font-semibold text-gray-900 dark:text-white leading-tight mt-1 line-clamp-2">Ecuador police storm shot-hit loti where an died</h4>
                            <div class="flex items-center text-xs text-gray-600 dark:text-gray-400 mt-1">
                                <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg> 1.2K</span>
                                <span class="mx-2">•</span>
                                <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.88 8.88 0 01-4.706-1.385l-.578.47C3.12 16.63 2 17 2 17s-.643-1.077.388-2.618l.295-.445A8.09 8.09 0 012 10c0-3.866 3.582-7 8-7s8 3.134 8 7z" clip-rule="evenodd"/></svg> 481</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-12">
            <h3 class="text-xl font-bold border-b pb-2 mb-6 text-gray-900 dark:text-white">More News</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="general-news-container">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transition transform hover:scale-105 duration-300 ease-in-out">
                    <img src="https://images.unsplash.com/photo-1543874052-8706d3d758f5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwyfHxwcm90ZXN0JTIwd29tZW58ZW5wwfHx8fDE3MTA1MDY0NjJ8MA&ixlib=rb-4.0.3&q=80&w=1080" alt="News Image" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <span class="text-xs text-gray-500 dark:text-gray-400">POLITICS</span>
                        <h4 class="font-bold text-lg mt-1 mb-2 text-gray-900 dark:text-white line-clamp-2">CFIF Leads Coalition Urging Congress to Support the Save Local Business Act</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-3">In a letter sent this week, a coalition of more than two dozen prominent free market organizations and the millions of members...</p>
                        <div class="flex items-center text-xs text-gray-600 dark:text-gray-400 mt-3">
                            <img src="https://via.placeholder.com/20" alt="Author" class="w-6 h-6 rounded-full mr-2">
                            <span>Alex H. Hiller</span>
                            <span class="mx-2">•</span>
                            <span>1.62K</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transition transform hover:scale-105 duration-300 ease-in-out">
                    <img src="https://images.unsplash.com/photo-1543874052-8706d3d758f5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxNXx8bWFyY2glMjBmb3IlMjBsaXZlc3xlbnwwfHx8fDE3MTA1MDY0NjN8MA&ixlib=rb-4.0.3&q=80&w=1080" alt="News Image" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <span class="text-xs text-gray-500 dark:text-gray-400">BUSINESS</span>
                        <h4 class="font-bold text-lg mt-1 mb-2 text-gray-900 dark:text-white line-clamp-2">China hands out at least twice as much development money as the US and more</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-3">In a letter sent this week, a coalition of more than two dozen prominent free market organizations and the millions of members...</p>
                        <div class="flex items-center text-xs text-gray-600 dark:text-gray-400 mt-3">
                            <img src="https://via.placeholder.com/20" alt="Author" class="w-6 h-6 rounded-full mr-2">
                            <span>Alex H. Hiller</span>
                            <span class="mx-2">•</span>
                            <span>2.43K</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <footer class="py-10 text-center text-sm text-gray-600 dark:text-gray-400 border-t mt-12">
            <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
            <p class="mt-1">© 2023 The PaperMag News. All rights reserved.</p>
        </footer>
    </div>

    <div id="authentication-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 transition-opacity duration-300 opacity-0 pointer-events-none bg-black/50"
        aria-hidden="true">
        <div
            class="bg-white dark:bg-gray-700 rounded-xl shadow-3xl w-full max-w-sm transform scale-95 transition-transform duration-300">
            <div class="p-6 md:p-8">
                <div class="flex items-center justify-between border-b pb-4 mb-4 dark:border-gray-600">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                        Sign in to the Platform
                    </h3>
                    <button type="button" id="close-modal"
                        class="text-gray-400 hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm p-1.5 transition dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Your email</label>
                        <input type="email" name="email" id="modal-email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-3 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="name@company.com" required />
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Your password</label>
                        <input type="password" name="password" id="modal-password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-3 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <input id="modal-remember" type="checkbox" name="remember"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-red-500 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-red-600" />
                            <label for="modal-remember"
                                class="ms-2 text-sm font-medium text-gray-700 dark:text-gray-300">Remember me</label>
                        </div>
                        <a href="#"
                            class="text-sm text-red-600 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 transition duration-150">Lost
                            Password?</a>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-semibold rounded-lg text-base px-5 py-3 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800 transition duration-150">
                        Login to your account
                    </button>
                </form>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300 mt-6 text-center">
                    Not registered? <a href="{{ route('register') }}"
                        class="text-red-600 hover:underline dark:text-red-400">Create account</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // === Modal Logic (Native JS) ===
        const modal = document.getElementById('authentication-modal');
        const modalContent = modal.querySelector('div:nth-child(1)'); // The inner div that holds the modal content
        const openButton = document.getElementById('open-modal');
        const closeButton = document.getElementById('close-modal');

        function openModal() {
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modalContent.classList.remove('scale-95');
            modalContent.classList.add('scale-100');
        }

        function closeModal() {
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('opacity-0', 'pointer-events-none');
            }, 300); // Wait for the transition to finish
        }

        openButton?.addEventListener('click', openModal);
        closeButton?.addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal(); // Close if clicked outside the modal content
            }
        });


        // News Fetching Logic (Native Fetch API)
        document.addEventListener('DOMContentLoaded', () => {
            const apiKey = '16fa3d583f514293a1e0fb4c6aca0125';
            const apiUrl = `https://newsapi.org/v2/top-headlines?country=us&apiKey=${apiKey}`;
            const recentNewsContainer = document.getElementById('recent-news-container');
            const trendingNewsContainer = document.getElementById('trending-news-container');
            const generalNewsContainer = document.getElementById('general-news-container');

            // Clear placeholders
            recentNewsContainer.innerHTML = '';
            trendingNewsContainer.innerHTML = '';
            generalNewsContainer.innerHTML = '';


            fetch(apiUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const articles = data.articles;
                    const defaultImage = 'https://via.placeholder.com/400x250?text=No+Image';

                    // Populate Recent News (e.g., first 2-3 articles)
                    articles.slice(0, 3).forEach(article => {
                        const articleElement = document.createElement('div');
                        articleElement.className = 'bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transition transform hover:scale-105 duration-300 ease-in-out';
                        articleElement.innerHTML = `
                            <img src="${article.urlToImage || defaultImage}" alt="${article.title || 'News image'}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <span class="text-xs text-gray-500 dark:text-gray-400 uppercase">${article.source.name || 'News'}</span>
                                <h4 class="font-bold text-lg mt-1 mb-2 text-gray-900 dark:text-white line-clamp-2">${article.title}</h4>
                                <div class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                                    <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg> ${Math.floor(Math.random() * 10) + 1}K</span>
                                    <span class="mx-2">•</span>
                                    <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.88 8.88 0 01-4.706-1.385l-.578.47C3.12 16.63 2 17 2 17s-.643-1.077.388-2.618l.295-.445A8.09 8.09 0 012 10c0-3.866 3.582-7 8-7s8 3.134 8 7z" clip-rule="evenodd"/></svg> ${Math.floor(Math.random() * 500) + 100}</span>
                                </div>
                            </div>
                        `;
                        recentNewsContainer.appendChild(articleElement);
                    });

                    // Populate Trending News (e.g., next 2 articles for sidebar)
                    articles.slice(3, 5).forEach(article => {
                        const articleElement = document.createElement('div');
                        articleElement.className = 'flex items-center';
                        articleElement.innerHTML = `
                            <img src="${article.urlToImage || defaultImage}" alt="${article.title || 'News image'}" class="w-20 h-20 object-cover rounded-lg mr-4">
                            <div>
                                <span class="text-xs text-gray-500 dark:text-gray-400 uppercase">${article.source.name || 'News'}</span>
                                <h4 class="font-semibold text-gray-900 dark:text-white leading-tight mt-1 line-clamp-2">${article.title}</h4>
                                <div class="flex items-center text-xs text-gray-600 dark:text-gray-400 mt-1">
                                    <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg> ${Math.floor(Math.random() * 10) + 1}K</span>
                                    <span class="mx-2">•</span>
                                    <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.88 8.88 0 01-4.706-1.385l-.578.47C3.12 16.63 2 17 2 17s-.643-1.077.388-2.618l.295-.445A8.09 8.09 0 012 10c0-3.866 3.582-7 8-7s8 3.134 8 7z" clip-rule="evenodd"/></svg> ${Math.floor(Math.random() * 500) + 100}</span>
                                </div>
                            </div>
                        `;
                        trendingNewsContainer.appendChild(articleElement);
                    });

                    // Populate General News Grid (e.g., remaining articles)
                    articles.slice(5, 11).forEach(article => { // Display a few more for the general grid
                        const articleElement = document.createElement('div');
                        articleElement.className = 'bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transition transform hover:scale-105 duration-300 ease-in-out';
                        articleElement.innerHTML = `
                            <img src="${article.urlToImage || defaultImage}" alt="${article.title || 'News image'}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <span class="text-xs text-gray-500 dark:text-gray-400 uppercase">${article.source.name || 'News'}</span>
                                <h4 class="font-bold text-lg mt-1 mb-2 text-gray-900 dark:text-white line-clamp-2">${article.title}</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-3">${article.description || ''}</p>
                                <div class="flex items-center text-xs text-gray-600 dark:text-gray-400 mt-3">
                                    <img src="https://via.placeholder.com/20" alt="Author" class="w-6 h-6 rounded-full mr-2">
                                    <span>${article.author || 'Unknown'}</span>
                                    <span class="mx-2">•</span>
                                    <span>${Math.floor(Math.random() * 10) + 1}K</span>
                                </div>
                            </div>
                        `;
                        generalNewsContainer.appendChild(articleElement);
                    });

                })
                .catch(error => {
                    console.error('Error fetching news:', error);
                    recentNewsContainer.innerHTML = '<p class="text-red-500 dark:text-red-400 col-span-full">Failed to load recent news.</p>';
                    trendingNewsContainer.innerHTML = '<p class="text-red-500 dark:text-red-400 col-span-full">Failed to load trending news.</p>';
                    generalNewsContainer.innerHTML = '<p class="text-red-500 dark:text-red-400 col-span-full">Failed to load general news.</p>';
                });
        });
    </script>
</body>

</html>