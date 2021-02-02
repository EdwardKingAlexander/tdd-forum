<x-guest-layout>
    <div>
       
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
                {{ $thread->creator->name }}
              </a>
            </p>
            <div class="flex space-x-1 text-sm text-gray-500">
              <time datetime="2020-03-16">
                Posted: {{ $thread->created_at->diffForHumans() }}
              </time>
            </div>
          </div>
        </div>
      </div>
     
      @foreach($thread->replies as $reply)
        @include('partials.reply')
      @endforeach
      @auth
      <div class="bg-white py-16 px-4 sm:px-6 lg:col-span-3 lg:py-24 lg:px-8 xl:pl-12">
        <div class="w-1/2 mx-auto lg:max-w-none">
          <form action="{{ $thread->path() . '/replies' }}" method="POST" class="grid grid-cols-1 gap-y-6">
              @csrf
         
            <div>
              <label for="body" class="sr-only">body</label>
              <textarea id="body" name="body" rows="4" class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md" placeholder="Have something to say?"></textarea>
            </div>
            <div>
              <button type="submit" class="inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Post Comment
              </button>
            </div>
          </form>
        </div>
      </div>
    @endauth
    @guest
    <div class="bg-white py-16 px-4 sm:px-6 lg:col-span-3 lg:py-24 lg:px-8 xl:pl-12">
        <div class="w-1/2 mx-auto lg:max-w-none">
            <p>
                <a class="text-blue-500" href="{{ route('login') }}">Sign in</a>
                 to participate in the discussion
            </p>
        </div>
    </div>
    @endguest


 
</x-guest-layout>