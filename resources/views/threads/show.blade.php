<x-guest-layout>
    <div>
        <div>
          <a href="#" class="inline-block">
            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
              Article
            </span>
          </a>
        </div>
        <a href="{{ url('/threads/'. $thread->id) }}" class="block mt-4">
          <p class="text-xl font-semibold text-gray-900">
            {{ $thread->title }}
          </p>
          <p class="mt-3 text-base text-gray-500">
            {{ $thread->body }}
          </p>
        </a>
        <div class="mt-6 flex items-center">
          <div class="flex-shrink-0">
            <a href="#">
              <span class="sr-only">Paul York</span>
              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </a>
          </div>
          <div class="ml-3">
            <p class="text-sm font-medium text-gray-900">
              <a href="#">
                Paul York
              </a>
            </p>
            <div class="flex space-x-1 text-sm text-gray-500">
              <time datetime="2020-03-16">
                Mar 16, 2020
              </time>
              <span aria-hidden="true">
                &middot;
              </span>
              <span>
                6 min read
              </span>
            </div>
          </div>
        </div>
      </div>

      @foreach($thread->replies as $reply)
<section class="bg-white overflow-hidden">
    <div class="relative max-w-7xl mx-auto pt-3 pb-3 px-4 sm:px-6 lg:px-8 lg:py-4">
  
      <div class="relative lg:flex lg:items-center">
     
  
        <div class="relative lg:ml-10 p-5 border rounded">
          
          <blockquote class="relative">
            <div class="text-2xl leading-9 font-medium text-gray-900">
              <p>
                {{ $reply->body }}
              </p>
            </div>
            <footer class="mt-8">
              <div class="flex">
               
                <div class="ml-4 lg:ml-0">
                  <div class="text-base font-medium text-gray-900">{{ $reply->owner->name }}</div>
                  <div class="text-base font-medium text-indigo-600">{{ $reply->created_at->diffForHumans() }}</div>
                </div>
              </div>
            </footer>
          </blockquote>
        </div>
      </div>
    </div>
  </section>
  
      @endforeach

</x-guest-layout>