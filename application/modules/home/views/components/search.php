<style type="text/css">
    .search-home{
        font-family: "Open Sans",sans-serif;
        margin-top:30px;
        padding-top:10px;
        /*background-color:rgba(130, 90, 44 , 0.5);*/
        /*background-color: #1b4a74;*/
        background-color: #60411a;

        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        /*width:100%;*/
        min-height:50px;
        font-size: 1.2em;

    }
    .search-home .text{
        /*border-bottom: 1px dashed #4b4b4b;*/
        color: #fff;
        font-family: "Open Sans",sans-serif;
        font-size: 1.2em;
        /*        margin-bottom: 10px;
                padding-bottom: 10px;*/
        text-transform: uppercase;

    }
</style>
<form action="http://libertyhomes.co.ke/search" method="get" class="form-horizontal" accept-charset="utf-8">    
    <div class="container">
        <div class="search-home">
            <div class="col-md-1 text">
                search 
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <div class="col-sm-12">
                        <select name="property_type" class="form-control dropdown-toggle">
                            <option value="0">Property Type</option>
                            <option value="9">Plots</option>
                            <option value="8">Courts</option>
                            <option value="7">Cottage</option>
                            <option value="6">Single House</option>
                            <option value="5">Family House</option>
                            <option value="4">Apartment</option>
                            <option value="3">Villa</option>
                        </select>                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="col-sm-12">
                        <select name="contract" class="form-control dropdown-toggle">
                            <option value="rent">Rent</option>
                            <option value="buy">Buy</option>
                        </select>                    </div>
                </div> 
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="col-sm-12">
                        <select name="bedrooms" class="form-control dropdown-toggle">
                            <option value="0">Bedrooms</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="col-sm-12">
                        <select name="bathrooms" class="form-control dropdown-toggle">
                            <option value="0">Bathrooms</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="col-sm-12">
                        <input id="inputSuccess" type="text" class="form-control" placeholder="Keyword">                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <div class="col-sm-12">
                        <input  name="submit" value="Search" class="btn btn-success" type="submit">                    </div>
                </div>
            </div>

        </div>
    </div>
</form>