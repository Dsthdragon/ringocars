<?php if (!empty($this->output)): ?>
    <div class="" style="padding: 1rem;">
        <div class="col-sm-12 col-md-6 offset-md-3">
            <?php if (is_array($this->output)) : ?>
                <?php foreach ($this->output as $key) : ?>
                    <p class="alert alert-danger dismissible">
                        <?php echo $key; ?>
                    </p>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="alert alert-success dismissible">
                    <?php echo $this->output; ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
