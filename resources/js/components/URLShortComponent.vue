<template>
    <div>
        <form action="">
            <div class="form-row">
                <div class="col-md-9 me-auto" style="padding-left: 100px">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-link"></i></span>
                        </div>
                        <input type="text" name="link" class="form-control" placeholder="Enter url">
                    </div>
                </div>
                <div class="col-md-2 ms-auto" style="margin-right: 100px">
                    <div class="d-grid col-12">
                        <button class="btn btn-primary btn-lg btn-block">Short URL</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "URLShortComponent"
    }
</script>

<style scoped>

</style>
