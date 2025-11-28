@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-gray-800 border-gray-500 text-white focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm placeholder-gray-400']) }}>