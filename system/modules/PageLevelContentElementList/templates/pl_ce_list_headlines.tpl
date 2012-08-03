
<!-- indexer::stop -->
<div class="<?php echo $this->class; ?> block"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
<?php if ($this->headline): ?>

<<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
<?php endif; ?>

<?php foreach ($this->elements as $element): ?>
<?php $headline = deserialize($element['headline']); ?>
{{link_open::<?php echo $element['page_id']; ?>}}<<?php echo $headline['unit']; ?>><?php echo $headline['value']; ?></<?php echo $headline['unit']; ?>>{{link_close}}
<?php endforeach; ?>

<?php echo $this->pagination; ?>

</div>
<!-- indexer::continue -->
