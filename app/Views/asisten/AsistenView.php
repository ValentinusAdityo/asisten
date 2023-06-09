<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<h1>Pendaftaran Asisten Praktikum</h1>
    <table class ="table">
        <tr>
            <th>
                NO
            </th>
            <th>
                NIM
            </th>
            <th>
                NAMA
            </th>
            <th>
                PRAKTIKUM
            </th>
            <th>
                IPK
            </th>
        </tr>
        <?php $i = 1?>
        <?php foreach ($list as $t) : ?>
        <tr>
            <td>
                <?= $i++; ?>
            </td>
            <td>
                <?= $t['NIM']; ?>
            </td>
            <td>
                <?= $t['NAMA']; ?>
            </td>
            <td>
                <?= $t['PRAKTIKUM']; ?>
            </td>
            <td>
                <?= $t['IPK']; ?>
            </td>
        </tr>
            <?php endforeach; ?>
    </table>

    <a href="/asisten/logout">logout</a>

    <?= $this->endSection(); ?>
 