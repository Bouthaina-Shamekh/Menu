<!DOCTYPE html>
<html dir="rtl" lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE = edge" />
    <meta name="viewport" content="width = device-width, initial-scale = 1.0" />
    <title>Epic Menu</title>
    <link rel="stylesheet" href="{{ asset('frontend/output.css')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet" />
  </head>
  <body class="bg-zinc-900 text-zinc-50" style="font-family: Almarai, sans-serif">
    <!-- OVERFLOW -->
    <div class="flex h-screen flex-row items-center justify-center overflow-hidden">
      <div
        class="no-scrollbar mx-auto h-screen w-full overflow-auto border-x border-zinc-800/50 bg-zinc-800/25 p-5 md:max-w-xl">
        <header class="relative flex items-center justify-center">
          <div class="flex flex-col items-center justify-start px-0 pb-5">
            <img
              src="{{ asset('uploads/menus/' . $menus->image) }}"
              alt="Logo"
              class="h-36 w-36 object-cover" />
            <h1 class="mb-7 text-lg font-semi-bold leading-none text-yellow-500 sm:text-xl">Epic Menu</h1>
            <ul
              id="slider"
              class="tab-wrapper no-scrollbar flex w-full snap-x flex-row items-start justify-start gap-3 overflow-x-auto">
              <!-- NEXT AND PREV BUTTONS -->
              <div
                id="next-slide"
                class="absolute top-[70%] right-2 z-[90] hidden h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-zinc-900/90 md:flex">
                <svg class="h-5 w-5 fill-white stroke-none">
                  <use xlink:href="./src/icons/icons.svg#chevron-right" />
                </svg>
              </div>
              <div
                id="prev-slide"
                class="absolute top-[70%] left-2 z-[90] hidden h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-zinc-900/90 md:flex">
                <svg class="h-5 w-5 fill-white stroke-none">
                  <use xlink:href="./src/icons/icons.svg#chevron-left" />
                </svg>
              </div>
              <!-- USER SELECT NONE -->
              @foreach ( $categories_slider as $item)


              <li class="slide flex shrink-0 snap-start items-center justify-center">
                <button
                  class="tab-button flex flex-col items-center justify-center gap-2 transition"
                  data-tab="category-1">
                  <img
                    src="{{ asset('uploads/categories/' . $item->image) }}"
                    alt="Categories-01"
                    class="pointer-events-none aspect-video w-32 select-none rounded-lg object-cover transition group-hover:rotate-2 group-hover:scale-110" />
                  <p class="pointer-events-none text-sm font-medium leading-normal">{{ $item->name }}</p>
                </button>
              </li>
              @endforeach






            </ul>
          </div>
        </header>
        <section>
          <div class="tab-content hidden" id="category-1">
            <div class="mb-3 flex flex-col items-center justify-center gap-3 sm:mb-5">
              <h2 class="text-base font-semi-bold leading-none sm:text-lg">{{$menus->title}}</h2>
              <p class="text-sm leading-none text-zinc-400">أشهى أصناف برجر اللحم</p>
            </div>
            <ul class="flex flex-col items-center justify-center gap-3 sm:gap-5">
                @foreach ( $meals as $item)

              <li>
                <!-- JUSTIFY BETWEEN -->
                <a
                  href="./details.html"
                  class="flex items-start justify-between gap-3 rounded-lg bg-zinc-800 p-3 sm:gap-5 sm:p-5">
                  <div class="flex flex-col items-start justify-center">
                    <h3 class="mb-3 text-base font-bold leading-5 sm:text-lg">{{ $item->name}}</h3>
                    <p class="mb-5 text-sm leading-relaxed text-zinc-400 line-clamp-3">{{ $item->content}} </p>



                    <p class="mb-5 text-sm font-semi-bold leading-none text-yellow-500">{{$item->price}} SR</p>
                    <div class="flex w-max items-start justify-start gap-1.5 sm:gap-3">
                      <svg class="h-6 w-6 fill-zinc-50 stroke-none">
                        <use xlink:href="./src/icons/icons.svg#icon-1" />
                      </svg>
                      <svg class="h-6 w-6 fill-zinc-50 stroke-none">
                        <use xlink:href="./src/icons/icons.svg#icon-2" />
                      </svg>
                      <svg class="h-6 w-6 fill-zinc-50 stroke-none">
                        <use xlink:href="./src/icons/icons.svg#icon-3" />
                      </svg>
                    </div>
                  </div>
                  <div class="aspect-square w-full shrink-0 basis-24 overflow-hidden rounded-lg xs:basis-32">
                    <img src="{{ asset('uploads/meals/' . $item->image) }}" alt="Products-01" class="h-full w-full object-cover" />
                  </div>
                </a>
              </li>
              @endforeach

            </ul>
          </div>


        </section>
      </div>
      <div class="hidden flex-1 flex-col items-center justify-center gap-5 md:flex">
        <!-- EDITS -->
        <img
          src="{{ asset('uploads/menus/' . $menus->image) }}"
          alt="Logo"
          class="h-36 w-36 object-cover" />
        <p class="mb-7 text-base font-semi-bold leading-none text-white sm:text-lg">Description</p>
      </div>
    </div>
    <script src="{{asset('frontend/app.js')}}"></script>
  </body>
</html>
