
<!-- indexer::stop -->
<div class="<?php echo $this->class; ?> block"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
<?php if ($this->headline): ?>

<<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
<?php endif; ?>

<?php
	$classEvenOdd = "odd";
	$classFirst = "first";
	$classLast = "";
?>
<ul class="subnav">
<?php foreach ($this->elements as $element): ?>
	<?php
	if ($element == end($this->elements)) {
		$classLast = "last";
	}
	?>
	<li class="entry <?php echo $classEvenOdd; ?> <?php echo $classFirst; ?> <?php echo $classLast; ?>">{{link::<?php echo $element['page_id']; ?>}}</li>
	<?php
	if ($classEvenOdd == "odd") {
		$classEvenOdd = "even";
	} else {
		$classEvenOdd = "odd";
	}
	
	$classFirst = "";
?>
<?php endforeach; ?>
</ul>

</div>
<!-- indexer::continue -->
