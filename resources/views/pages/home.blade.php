<x-layouts.app :settings="$settings">
  <x-home.hero :about="$about" :settings="$settings" />
  <x-home.about :about="$about" />
  <x-home.departments :departments="$departments" />
  <!-- <x-home.services :services="$services" /> -->
  <x-home.find-doctor :doctors="$doctors" />
  <!-- <x-home.cta /> -->
</x-layouts.app>