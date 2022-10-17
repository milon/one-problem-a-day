---
extends: _layouts.post
section: content
title: Best sightseeing pair
problemUrl: https://leetcode.com/problems/best-sightseeing-pair/
date: 2022-10-17
categories: [array-and-hashmap]
---

Count the current best score in all previous sightseeing spot. Note that, as we go further, the score of previous spot decrement.

cur will record the best score that we have met. We iterate each value a in the array and update the result with the current best score plus the current value minus the index. Then we update the current best score with the current value plus the index.

update res by max(res, cur + a), also we can update cur by max(cur, a). Note that when we move forward, all sightseeing spot we have seen will be 1 distance further.

So for the next sightseeing spot cur = max(cur, a) - 1

```python
class Solution:
    def maxScoreSightseeingPair(self, values: List[int]) -> int:
        res = imax = 0
        for i, val in enumerate(values):
            res = max(res, imax+val-i)
            imax = max(imax, val+i)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`