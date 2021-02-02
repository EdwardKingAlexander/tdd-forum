<x-guest-layout>
    
<div class="bg-white overflow-hidden shadow rounded-lg w-1/2 mx-auto">
    <div class="px-4 py-5 sm:p-6">
        <form class="space-y-6" action="/threads" method="POST">
            @csrf
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3 sm:col-span-2">
              <label for="title" class="block text-sm font-medium text-gray-700">
                Title
              </label>
              <div class="mt-1 flex rounded-md shadow-sm">
                <input type="text" name="title" id="title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
              </div>
            </div>
          </div>

          <div>
            <label for="body" class="block text-sm font-medium text-gray-700">
              body
            </label>
            <div class="mt-1">
              <textarea id="body" name="body" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
            </div>
            <p class="mt-2 text-sm text-gray-500">
              Body
            </p>
          </div>

          <div class="flex justify-end">
            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Publish
            </button>
          </div>
        </form>


    </div>
  </div>
  

  
</x-guest-layout>