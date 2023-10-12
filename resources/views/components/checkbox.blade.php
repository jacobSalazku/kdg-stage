@props(['disabled' => false])

<input type="checkbox"{{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-blue-300 dark:border-blue-700 dark:bg-blue-900 dark:text-blue-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
