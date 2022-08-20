---
extends: _layouts.post
section: content
title: Minimum number of refueling stops
problemUrl: https://leetcode.com/problems/minimum-number-of-refueling-stops/
date: 2022-08-20
categories: [heap]
---

We can be greedy and use a max heap to to count the number of refueling stop. First we will append the target to the stations list, where fuel will be 0. We will assing the startFuel as nextStop as it can take us up to the next stop. Then we iterate over the stations, if the next stop is less than the station's position, we will take a value out from the max heap, if our heap is empty, we immediately return -1. Then we check whether the fuel can take us to the next stop, if possible, then we append it to the max heap.

```python
class Solution:
    def minRefuelStops(self, target: int, startFuel: int, stations: List[List[int]]) -> int:
        bag = []
        nextStop = startFuel
        ans = 0
        stations.append([target, 0])
        for station in stations:
            while station[0] > nextStop:
                if not bag:
                    return -1
                nextStop -= heapq.heappop(bag) 
                ans += 1
            if station[0] <= nextStop:
                heapq.heappush(bag, -1*station[1])
        return ans
```

Time Complexity: `O(n*log(n))` <br/>
Space Complexity: `O(n)`