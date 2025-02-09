<?php

namespace Tazz\GoogleAuthManager\Services;

use PragmaRX\Google2FA\Google2FA;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class GoogleAuthService
{
    protected Google2FA $google2fa;

    public function __construct(array $config)
    {
        $this->google2fa = new Google2FA();
        $this->google2fa->setWindow($config['window']);
    }

    public function generateSecretKey(): string
    {
        return $this->google2fa->generateSecretKey(config('google-auth.secret_length', 32));
    }

    public function verifyKey(string $secret, string $oneTimePassword): bool
    {
        return $this->google2fa->verifyKey($secret, $oneTimePassword);
    }

    public function getQRCodeUrl(string $email, string $secret): string
    {
        return $this->google2fa->getQRCodeUrl(
            config('google-auth.app_name'),
            $email,
            $secret
        );
    }

    public function generateQRCodeSvg(string $email, string $secret): string
    {
        $renderer = new ImageRenderer(
            new RendererStyle(config('google-auth.qr_size')),
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);
        
        return $writer->writeString($this->getQRCodeUrl($email, $secret));
    }
}