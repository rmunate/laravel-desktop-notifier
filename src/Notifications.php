<?php

/**
 * This file is part of Laravel Desktop Notifier.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace NunoMaduro\LaravelDesktopNotifier;

use NunoMaduro\LaravelDesktopNotifier\Contracts\Notifier;
use NunoMaduro\LaravelDesktopNotifier\Contracts\Notification;

/**
 * An helper trait to include on Laravel console commands.
 *
 * @author Nuno Maduro <enunomaduro@gmail.com>
 */
trait Notifications
{
    /**
     * @param  string $text
     * @param  string $body
     * @param  null $icon
     *
     * @return void
     */
    public function notify($text, $body, $icon = null)
    {
        $notifier = app(Notifier::class);

        $notification = app(Notification::class)
            ->setTitle($text)
            ->setBody($body)
            ->setIcon($icon);

        $notifier->send($notification);
    }
}