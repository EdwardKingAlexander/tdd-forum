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

</x-guest-layout>