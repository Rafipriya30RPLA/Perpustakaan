@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://images.vexels.com/media/users/3/157555/isolated/preview/2b48b29abd18febe3b1f92a85913ce39-simple-book-icon.png" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
