@extends('layouts.app')

@section('title', 'Events - KUET')
@section('page_title', 'Campus Events')

@section('content')

<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Upcoming Events & Activities</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Stay updated with the latest events organized by various prestigious clubs of Khulna University of Engineering & Technology.</p>
    </div>

    <!-- Filter/Tabs (Optional Visual only) -->
    <div class="flex flex-wrap justify-center gap-4 mb-10">
        <button class="px-6 py-2 bg-red-700 text-white font-semibold rounded-full hover:bg-red-800 transition shadow-md">All Events</button>
        <button class="px-6 py-2 bg-white text-gray-700 font-semibold rounded-full border border-gray-300 hover:bg-gray-100 transition shadow-sm">SGIPC</button>
        <button class="px-6 py-2 bg-white text-gray-700 font-semibold rounded-full border border-gray-300 hover:bg-gray-100 transition shadow-sm">Hack</button>
        <button class="px-6 py-2 bg-white text-gray-700 font-semibold rounded-full border border-gray-300 hover:bg-gray-100 transition shadow-sm">KBEC</button>
        <button class="px-6 py-2 bg-white text-gray-700 font-semibold rounded-full border border-gray-300 hover:bg-gray-100 transition shadow-sm">KAC</button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- Event Card 1 - SGIPC -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
            <div class="h-48 bg-blue-600 relative flex items-center justify-center">
                <!-- Abstract pattern/image placeholder -->
                <div class="absolute inset-0 opacity-20 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCI+CjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0ibm9uZSI+PC9yZWN0Pgo8Y2lyY2xlIGN4PSIyIiBjeT0iMiIgcj0iMiIgZmlsbD0iI2ZmZiI+PC9jaXJjbGU+Cjwvc3ZnPg==')]"></div>
                <h3 class="text-3xl font-black text-white relative z-10 tracking-wider">CODESTORM</h3>
                <span class="absolute top-4 right-4 bg-white text-blue-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">SGIPC</span>
            </div>
            <div class="p-6">
                <div class="flex items-center text-gray-500 text-sm mb-3">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Oct 12, 2026 • 09:00 AM</span>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-2">Inter-University Programming Contest</h4>
                <p class="text-gray-600 mb-4 line-clamp-2">Join the biggest competitive programming battle hosted by SGIPC. Test your algorithmic skills and win exciting prizes!</p>
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Student Welfare Center (SWC)
                </div>
                <a href="#" class="inline-block w-full text-center bg-blue-50 text-blue-700 font-semibold py-2 rounded-lg hover:bg-blue-600 hover:text-white transition-colors border border-blue-200">Register Now</a>
            </div>
        </div>

        <!-- Event Card 2 - Hack -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
            <div class="h-48 bg-gray-900 relative flex items-center justify-center">
                <div class="absolute inset-0 opacity-30 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCI+PHBhdGggZD0iTTAgMGg0MHY0MEgweiIgZmlsbD0ibm9uZSIvPjxwYXRoIGQ9Ik0wIDEwaDQwTTAgMjBoNDBNMCAzMGg0ME0xMCAwdjQwTTIwIDB2NDBNMzAgMHY0MCIgc3Ryb2tlPSIjZmZmIiBzdHJva2Utb3BhY2l0eT0iLjEiLz48L3N2Zz4=')]"></div>
                <h3 class="text-3xl font-black text-green-400 relative z-10 tracking-wider">ROBOTICS FEST</h3>
                <span class="absolute top-4 right-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">HACK</span>
            </div>
            <div class="p-6">
                <div class="flex items-center text-gray-500 text-sm mb-3">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Nov 05, 2026 • 10:00 AM</span>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-2">National Hardware Hackathon</h4>
                <p class="text-gray-600 mb-4 line-clamp-2">Build innovative hardware solutions in 48 hours. Show your passion for IoT, robotics, and embedded systems.</p>
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    EEE Building, Ground Floor
                </div>
                <a href="#" class="inline-block w-full text-center bg-gray-50 text-gray-800 font-semibold py-2 rounded-lg hover:bg-gray-900 hover:text-white transition-colors border border-gray-300">View Details</a>
            </div>
        </div>

        <!-- Event Card 3 - KBEC -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
            <div class="h-48 bg-yellow-500 relative flex items-center justify-center">
                <div class="absolute inset-0 opacity-20 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMCIgaGVpZ2h0PSIxMCI+CjxyZWN0IHdpZHRoPSIxMCIgaGVpZ2h0PSIxMCIgZmlsbD0ibm9uZSI+PC9yZWN0Pgo8cGF0aCBkPSJNMCAwbDEwIDEwTTEwIDBMMCAxMCIgc3Ryb2tlPSIjMDAwIi8+Cjwvc3ZnPg==')]"></div>
                <h3 class="text-3xl font-black text-gray-900 relative z-10 tracking-wider">BIZ SUMMIT</h3>
                <span class="absolute top-4 right-4 bg-gray-900 text-yellow-400 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">KBEC</span>
            </div>
            <div class="p-6">
                <div class="flex items-center text-gray-500 text-sm mb-3">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Dec 10, 2026 • 03:00 PM</span>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-2">Business Idea Competition</h4>
                <p class="text-gray-600 mb-4 line-clamp-2">Pitch your groundbreaking startup ideas to industry leaders. Learn, network, and grow with the KBEC community.</p>
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Auditorium, KUET
                </div>
                <a href="#" class="inline-block w-full text-center bg-yellow-50 text-yellow-700 font-semibold py-2 rounded-lg hover:bg-yellow-500 hover:text-gray-900 transition-colors border border-yellow-200">Submit Idea</a>
            </div>
        </div>

        <!-- Event Card 4 - KAC -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
            <div class="h-48 bg-emerald-600 relative flex items-center justify-center">
                <div class="absolute inset-0 opacity-20 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCI+PHBhdGggZD0iTTAgMjBsMjAtMjBMMDAgMEwwIDIweiIgZmlsbD0iI2ZmZiIvPjwvc3ZnPg==')]"></div>
                <h3 class="text-3xl font-black text-white relative z-10 tracking-wider">EXPEDITION</h3>
                <span class="absolute top-4 right-4 bg-white text-emerald-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">KAC</span>
            </div>
            <div class="p-6">
                <div class="flex items-center text-gray-500 text-sm mb-3">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Jan 15, 2027 • 06:00 AM</span>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-2">Winter Trek to Sylhet</h4>
                <p class="text-gray-600 mb-4 line-clamp-2">A thrilling 3-day adventure tour packed with trekking, camping, and nature exploration organized by KUET Adventure Club.</p>
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Sylhet, Bangladesh
                </div>
                <a href="#" class="inline-block w-full text-center bg-emerald-50 text-emerald-700 font-semibold py-2 rounded-lg hover:bg-emerald-600 hover:text-white transition-colors border border-emerald-200">Join Tour</a>
            </div>
        </div>

        <!-- Event Card 5 - General -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
            <div class="h-48 bg-purple-600 relative flex items-center justify-center">
                <div class="absolute inset-0 opacity-20 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCI+PHBhdGggZD0iTTEyIDBMNiA2djEybDYgNmwxMi0xMnYtNkwxMiAwem0wIDlsMyAzdjZsLTMgM2wtMy0zdi02bDMtM3ptMCA0bDItMnYtNGwtMi0ybC0yIDJ2NGwyIDJ6IiBmaWxsPSIjZmZmIi8+PC9zdmc+')]"></div>
                <h3 class="text-3xl font-black text-white relative z-10 tracking-wider">TECH FAIR</h3>
                <span class="absolute top-4 right-4 bg-white text-purple-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">KUET</span>
            </div>
            <div class="p-6">
                <div class="flex items-center text-gray-500 text-sm mb-3">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Feb 20, 2027 • 09:00 AM</span>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-2">Annual Tech Carnival</h4>
                <p class="text-gray-600 mb-4 line-clamp-2">The grand tech festival featuring project showcases, gaming tournaments, and guest lectures from tech giants.</p>
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    KUET Central Field
                </div>
                <a href="#" class="inline-block w-full text-center bg-purple-50 text-purple-700 font-semibold py-2 rounded-lg hover:bg-purple-600 hover:text-white transition-colors border border-purple-200">Explore</a>
            </div>
        </div>

    </div>
</div>

@endsection
