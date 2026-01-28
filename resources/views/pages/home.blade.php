<x-layouts.app :settings="$settings">
  <x-home.hero :about="$about" :abouts="$abouts" :settings="$settings" />
  <x-home.about :about="$about" />
  <x-home.poliklinik :polikliniks="$polikliniks" />
  <!-- <x-home.services :services="$services" /> -->
  <x-home.doctor :doctors="$doctors" />
  <!-- <x-home.cta /> -->
</x-layouts.app>