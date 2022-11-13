<div class="event-summary">
                <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                  <span class="event-summary__month"><?php 
                      // create a new DateTime class filled with the event_date from Advanced Custom Fields and assign it to the #eventDate variable
                    $eventDate = new DateTime(get_field('event_date'));

                    // output the Month part of the event_date variable 
                    echo $eventDate->format('M');
                  ?></span>                                  <!-- Output the day part of the $eventDate variable -->
                  <span class="event-summary__day"><?php echo $eventDate->format('d'); ?></span>
                </a>
                <div class="event-summary__content">
                  <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                  <p><?php if (has_excerpt()) {
                                  echo get_the_excerpt();
                                } else {
                                  echo wp_trim_words(get_the_content(), 18);
                                } ?><a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
                </div>
              </div>