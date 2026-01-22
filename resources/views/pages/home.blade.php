<x-layouts.app :settings="$settings">
  <x-home.hero />
  <x-home.about />
  <x-home.departments :departments="$departments" />
  <x-home.services :services="$services" />
  <x-home.find-doctor :doctors="$doctors" />
  <!-- <x-home.cta /> -->
</x-layouts.app>