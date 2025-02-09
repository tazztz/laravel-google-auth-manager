<div>
    <h2>Enable Two Factor Authentication</h2>
    
    <div>
        <p>Scan this QR code with your Google Authenticator app:</p>
        <div>
            {!! $qrCode !!}
        </div>
    </div>

    <form method="POST" action="{{ route('2fa.verify') }}">
        @csrf
        <div>
            <label for="code">Verification Code</label>
            <input type="text" name="code" id="code" required>
        </div>
        <button type="submit">Verify</button>
    </form>
</div> 