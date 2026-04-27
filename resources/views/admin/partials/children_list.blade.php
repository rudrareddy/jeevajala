<h5>Children ({{ $children->total() }})</h5>

@foreach($children as $child)
    <div class="border rounded p-2 mb-2">
        {{ $child->username }} ({{ $child->name }})
    </div>
@endforeach

<div class="mt-3">
    {{ $children->links() }}
</div>
<script>
document.addEventListener('click', function (e) {
    const link = e.target.closest('#children-container .pagination a');

    if (!link) return;

    e.preventDefault();

    fetch(link.href, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(res => res.text())
    .then(html => {
        document.getElementById('children-container').innerHTML = html;
        window.scrollTo({ top: 500, behavior: 'smooth' });
    })
    .catch(() => alert('Failed to load data'));
});
</script>