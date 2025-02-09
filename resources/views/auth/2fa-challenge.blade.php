<div>
    <h2>Two Factor Authentication</h2>
    
    <form method="POST" action="{{ route('2fa.verify-login') }}">
        @csrf
        <div>
            <label for="code">Enter the code from Google Authenticator</label>
            <input type="text" name="code" id="code" required>
        </div>
        <button type="submit">Verify</button>
    </form>
</div> 