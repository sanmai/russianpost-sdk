<?php

/**
 * This file is part of RussianPost SDK package.
 *
 * © Appwilio (http://appwilio.com), greabock (https://github.com/greabock), JhaoDa (https://github.com/jhaoda)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/** @noinspection PhpUnusedPrivateFieldInspection */

declare(strict_types=1);

namespace Appwilio\RussianPostSDK\Dispatching\Enum;

use Appwilio\RussianPostSDK\Core\Enum;

/**
 * Разряд письма.
 *
 * @see https://otpravka.pochta.ru/specification#/enums-base-mail-rank
 *
 * @method static MailRank WO_RANK() Без разряда
 * @method static MailRank CREDIT() Кредитное
 * @method static MailRank MILITARY() Воинское
 * @method static MailRank OFFICIAL() Служебное
 * @method static MailRank JUDICIAL() Судебное
 * @method static MailRank GOVERNMENTAL() Правительственное
 * @method static MailRank PRESIDENTIAL() Президентское
 * @method static MailRank ADMINISTRATIVE() Административное
 */
final class MailRank extends Enum
{
    /** Без разряда */
    private const WO_RANK = 'WO_RANK';
    /** Кредитное */
    private const CREDIT = 'CREDIT';
    /** Воинское */
    private const MILITARY = 'MILITARY';
    /** Служебное */
    private const OFFICIAL = 'OFFICIAL';
    /** Судебное */
    private const JUDICIAL = 'JUDICIAL';
    /** Правительственное */
    private const GOVERNMENTAL = 'GOVERNMENTAL';
    /** Президентское */
    private const PRESIDENTIAL = 'PRESIDENTIAL';
    /** Административное */
    private const ADMINISTRATIVE = 'ADMINISTRATIVE';
}
