<div class="modal fade" tabindex="-1" id="modalDeleteLink-{{ $link->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus shortlink {{ $link->short }}?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <p>Link yang sudah dihapus tidak dapat dikembalikan.</p>
                <p>You yakin mzz?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                <form action="/link/{{ $link->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Yakin</button>
                </form>

            </div>
        </div>
    </div>
</div>
