<article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
    <header class="header-page">
        <div class="container">
            <?php the_title('<h1>', '</h1>'); ?>
        </div>
    </header>

    <div class="charts-box">
      <div class="container">
        <div class="alert alert-danger" id="chartError"></div>
      </div>

      <div id="chartTabs">
        <div class="tabs-top">
            <div class="container">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#indices" aria-controls="indices" role="tab" data-toggle="tab">Indices</a></li>
                <li role="presentation"><a href="#fastvar" aria-controls="fastvar" role="tab" data-toggle="tab">FASTVaR Chart</a></li>
                <li role="presentation"><a href="#volatility" aria-controls="volatility" role="tab" data-toggle="tab">Volatility Chart</a></li>
                <li role="presentation" class=""><a href="#comparison" aria-controls="comparison" role="tab" data-toggle="tab" id="comparison-toggle">Comparison Chart</a></li>
              </ul>
            </div>
            <div class="tabs-bottom">
              <div class="container">
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="indices">
                      <div id="indecies">
                        <div class="charts-content">
                          <?php the_content(); ?>
                        </div>

                        <div class="form-group text-left">
                          <label for="index-search">Filter by name: </label>
                          <input class="search" class="form-control" name="index-search" placeholder="Name" />
                        </div>

                        <div class="table-responsive">
                          <table class="table table-bordered charts-table">
                            <thead>
                              <tr>
                                <th><button class="sort asc" data-sort="name">Index</button></th>
                                <th><button class="sort" data-sort="eid">Forecast Volatility</button></th>
                                <th><button class="sort" data-sort="fid">30 Day Moving Average Forecast Volatility</button></th>
                                <th><button class="sort" data-sort="ticker">95% Value At Risk - 1 Day Ahead</button></th>
                                <th><button class="sort" data-sort="mid">99% Value At Risk - 1 Day Ahead</button></th>
                              </tr>
                            </thead>
                            <tbody class="list">
                              <?php
                                $query = chart_populate_initial_table();

                                foreach ($query as $value):
                              ?>
                                <tr data-index="<?php echo $value->id; ?>">
                                  <td class="name"><?php echo $value->name; ?></td>
                                  <td class="eid"><?php echo $value->volatility; ?></td>
                                  <td class="fid"><?php echo $value->moving_average; ?></td>
                                  <td class="ticker"><?php echo $value->value_95; ?></td>
                                  <td class="mid"><?php echo $value->value_96; ?></td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="fastvar">
                      <div data-chart id="fastvarChart" style="width: 100%;">
                          FastVar Chart could not be loaded. Please try again later
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="volatility">
                        <div data-chart id="volatilityChart" style="width: 100%;">
                          Volatility Chart could not be loaded. Please try again later
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="comparison">
                        <div class="form-group">
                          <label for="index-search">Compare with: </label>
                          <select name="" id="comparisonID">
                            <option value="">Please select</option>
                            <?php
                                $query = populate_indecies_select();

                                foreach ($query as $value):
                              ?>
                                <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                              <?php endforeach; ?>
                          </select>
                        </div>
                        <div data-chart id="comparisonChart" style="width: 100%;">
                          Comparison Chart could not be loaded. Please try again later
                        </div>
                        <label>Volatility: <input type="checkbox" id="forecastToggle" checked value="1"></label>
                        <label>Performance: <input type="checkbox" id="forecastPerformance" checked value="1"></label>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</article>