---
extends: _layouts.post
section: content
title: Design a food rating system
problemUrl: https://leetcode.com/problems/design-a-food-rating-system/
date: 2022-09-09
categories: [heap, design]
---

We will have a hashmap for mapping the food to the cuisines and another hashmap to for the ratings. Whenever we receive a new rating or change rating, we add it to our max heap where we store the rate and food based on cousine. Then when we look for highest rated values, we match the ratings from the heap with the rating hashmap, if there is a mismatch, we pop that from the heap. Then we return the top of the heap.

```python
class FoodRatings:

    def __init__(self, foods: List[str], cuisines: List[str], ratings: List[int]):
        self.food2cuisine = dict(zip(foods, cuisines))
        self.cuisine2heap = defaultdict(list)   # maxheap {cuisine:[(-rate, food)]}
        self.rate = defaultdict(dict)
        
        for food, cuisine, rating in zip(foods, cuisines, ratings):
            self.rate[cuisine][food] = -rating
            heapq.heappush(self.cuisine2heap[cuisine], (-rating, food))

    def changeRating(self, food: str, newRating: int) -> None:
        cuisine = self.food2cuisine[food]
        self.rate[cuisine][food] = -newRating
        heapq.heappush(self.cuisine2heap[cuisine], (-newRating, food))

    def highestRated(self, cuisine: str) -> str:
        # remove the top element with unmatched rate in self.rate 
        while(self.rate[cuisine][self.cuisine2heap[cuisine][0][1]]!=self.cuisine2heap[cuisine][0][0]):
            heapq.heappop(self.cuisine2heap[cuisine])
        return self.cuisine2heap[cuisine][0][1]

# Your FoodRatings object will be instantiated and called as such:
# obj = FoodRatings(foods, cuisines, ratings)
# obj.changeRating(food,newRating)
# param_2 = obj.highestRated(cuisine)
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(n)`