<table class="table table-bordered table-striped table-hover align-middle" id="tableSingles" style="width:100%;">
    <thead class="table-dark">
        <thead>
            <tr>
                <th>#</th>
                <th>Pseudo</th>
                <th>Catégorie</th>
                <th>Interprète1</th>
                <th>Interprète2</th>
                <th>Titre</th>
                <th>Année</th>
                <th>Titre Album</th>
            </tr>
        </thead>
    <tbody>
        <?php if ($singles) : ?>
            <?php foreach ($singles as $single) : ?>
                <tr>
                    <td><?= $single->id; ?></td>
                    <td><?= $single->pseudo; ?></td>
                    <td><?= $single->category; ?></td>
                    <td><?= $single->name1; ?></td>
                    <td><?= $single->name1; ?></td>
                    <td><?= $single->title; ?></td>
                    <td><?= $single->name1; ?></td>
                    <td><?= $single->name1; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>