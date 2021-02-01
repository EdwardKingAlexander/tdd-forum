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