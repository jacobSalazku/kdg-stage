@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
<img src="https://cdn-assets-cloud.frontify.com/s3/frontify-cloud-files-us/eyJwYXRoIjoiZnJvbnRpZnlcL2FjY291bnRzXC9lY1wvMjM1MjkwXC9wcm9qZWN0c1wvMzM3NDcwXC9hc3NldHNcLzgzXC82NDM2MTM4XC81MzIzN2EzODU5ZmQzYzExNDhmZTMxZTkzNTBiMGYwZS0xNjQ5MTYwNjk1LnBuZyJ9:frontify:VEX8W1EVSDpuVxGW_P38NwjYtM9hkGfGAF0dcI3Uje4?width=2400" class="logo" alt="KdG Logo">
{{ $slot }}
</a>
</td>
</tr>
