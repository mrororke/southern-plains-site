 <aside class="w-64 bg-[#71717A] text-white flex flex-col" style="background-color: #71717A;">
     <div class="text-black lg:text-white mx-auto pt-4">
         <a href="/admin/dashboard">
             <x-application-logo class="w-20 h-20 fill-current" />
         </a>

     </div>
     <div class="italic text-sm pt-4 mx-auto">
         {{ Auth::user()->name }}
     </div>

     <nav class="flex-1 pt-8 space-y-2">

        <x-portal.sidebar-link
            label="Dashboard"
            :route="route('admin.dashboard')"
            :active="request()->routeIs('admin.dashboard')"
            top-level
        />

        <x-portal.sidebar-section title="Tricks">

             <x-portal.sidebar-link
                 label="Catalog"
                 :route="route('admin.posts.index')"
                 :active="request()->routeIs('admin.posts.*')"
                 nested />
             <x-portal.sidebar-link
                 label="Categories"
                 route="#"
                 nested />

             <x-portal.sidebar-link
                 label="Tags"
                 route="#"
                 nested />

         </x-portal.sidebar-section>

         <x-portal.sidebar-section title="Content">

             <x-portal.sidebar-link
                 label="Posts"
                 :route="route('admin.posts.index')"
                 :active="request()->routeIs('admin.posts.*')"
                 nested />
             <x-portal.sidebar-link
                 label="Categories"
                 route="#"
                 nested />

             <x-portal.sidebar-link
                 label="Tags"
                 route="#"
                 nested />

         </x-portal.sidebar-section>


         <x-portal.sidebar-section title="Training">

             <x-portal.sidebar-link
                 label="Programs"
                 route="#"
                 nested />
             <x-portal.sidebar-link
                 label="Classes"
                 route="#"
                 nested />
             <x-portal.sidebar-link
                 label="Workshops"
                 route="#"
                 nested />
             <x-portal.sidebar-link
                 label="Private Training"
                 route="#"
                 nested />

         </x-portal.sidebar-section>

         <x-portal.sidebar-section title="League">

             <x-portal.sidebar-link
                 label="Seasons"
                 route="#"
                 nested />
             <x-portal.sidebar-link
                 label="Competitors"
                 route="#"
                 nested />
             <x-portal.sidebar-link
                 label="Scores"
                 route="#"
                 nested />
             <x-portal.sidebar-link
                 label="Rankings"
                 route="#"
                 nested />

         </x-portal.sidebar-section>

         <x-portal.sidebar-section title="Events">

             <x-portal.sidebar-link
                 label="Events"
                 route="#"
                 nested />

             <x-portal.sidebar-link
                 label="Calendar"
                 route="#"
                 nested />

             <x-portal.sidebar-link
                 label="Registrations"
                 route="#"
                 nested />

         </x-portal.sidebar-section>

         <x-portal.sidebar-section title="CRM">

             <x-portal.sidebar-link
                 label="Clients"
                 route="#"
                 nested />
             <x-portal.sidebar-link
                 label="Dogs"
                 route="#"
                 nested />
             <x-portal.sidebar-link
                 label="History Forms"
                 route="#"
                 nested />
             <x-portal.sidebar-link
                 label="Evaluations"
                 route="#"
                 nested />

         </x-portal.sidebar-section>

         <x-portal.sidebar-section title="Learning">

             <x-portal.sidebar-link
                 label="Courses"
                 route="#"
                 nested />
             <x-portal.sidebar-link
                 label="Lessons"
                 route="#"
                 nested />
             <x-portal.sidebar-link
                 label="Resources"
                 route="#"
                 nested />

         </x-portal.sidebar-section>

         <x-portal.sidebar-section title="Rats">

             <x-portal.sidebar-link
                 label="Rats"
                 route="#"
                 nested />
             <x-portal.sidebar-link
                 label="Litters"
                 route="#"
                 nested />
             <x-portal.sidebar-link
                 label="Pedigrees"
                 route="#"
                 nested />

         </x-portal.sidebar-section>

         <x-portal.sidebar-section title="Admin">

             <x-portal.sidebar-link
                 label="Users"
                 route="#"
                 nested />
             <x-portal.sidebar-link
                 label="Roles"
                 route="#"
                 nested />
             <x-portal.sidebar-link
                 label="Permissions"
                 route="#"
                 nested />
             <x-portal.sidebar-link
                 label="Settings"
                 route="#"
                 nested />

         </x-portal.sidebar-section>

     </nav>

     <div class="p-4 border-t border-white">
         <form method="POST" action="{{ route('logout') }}">
             @csrf
             <button type="submit" class="w-full text-left py-2 px-4 text-sm uppercase transition duration-200 hover:bg-club-hover bg-club">
                 Log Out
             </button>
         </form>
     </div>
 </aside>