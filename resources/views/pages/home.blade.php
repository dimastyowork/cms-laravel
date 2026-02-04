<x-layouts.app :settings="$settings">
  <x-home.slider :about="$about" :abouts="$abouts" :settings="$settings" />
  <x-home.about :about="$about" />
  <x-home.service-directory :services="$services" />
  <x-home.poliklinik :polikliniks="$polikliniks" :settings="$settings" />
  <x-home.doctor :doctors="$doctors" />
</x-layouts.app>