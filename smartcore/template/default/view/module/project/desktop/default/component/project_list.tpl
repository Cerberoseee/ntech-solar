  <?php $this->document->addPageStyle("module/project/desktop/default/component/css/project.css") ?>
<div class="row">
    <?php if(!empty($projects)) { ?>
    <?php foreach($projects as $project) { ?>
    <div class="col-lg-4 col-md-6 project-list__item">
        <div class="project-list__item-wrapper">
            <a class="project-list__item-link" href="<?php echo $project[link]?>"></a>
            <picture class="lazy">
                <source data-srcset="<?php echo URL_USERIMAGE ?>fixsize-740x416/<?php echo $project['imagepath'] ?>.webp?v=<?php echo IMAGE_VERSION ?>" type="image/webp">
                <source data-srcset="<?php echo URL_USERIMAGE ?>fixsize-740x416/<?php echo $project['imagepath'] ?>?v=<?php echo IMAGE_VERSION ?> 2x" type="image/jpeg">
                <img width="370" height="208"
                     data-src="<?php echo URL_USERIMAGE ?>fixsize-370x208/<?php echo $project['imagepath'] ?>?v=<?php echo IMAGE_VERSION ?>"
                     src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='370' height='208'><rect style='fill:rgb(245,245,245);' width='100%' height='100%' /></svg>" >
            </picture>
            <div class="project-list__item-info">
                <div class="project-list__item-info-content text-center">
                    <div class="project-list__item-icon"><svg width="7" height="12" class="icon"><use xlink:href="<?php echo URL_IMAGE ?>icons.svg#angle-right"></use></svg></div>
                    <div class="project-list__item-title"><?php echo $project['name'] ?></div>
                    <div class="project-list__item-detail">Năm: <?php echo explode("/", $project['completed_date'])[2] ?> - <?php echo $project['wattage']?></div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php } ?>
</div>
