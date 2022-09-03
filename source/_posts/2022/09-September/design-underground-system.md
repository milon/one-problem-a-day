---
extends: _layouts.post
section: content
title: Design underground system
problemUrl: https://leetcode.com/problems/design-underground-system/
date: 2022-09-03
categories: [array-and-hashmap]
---

We will use 2 hashmap to store the passengers data and travel time data. When someone check if, we add it to the passengers hashset, along with the time. When someone check out, we take the start time from the hashset, and add the difference in out travel times hashmap, the key will the `startStation-endStation` as a string. Whenever we need the average, we will grab the values with the same key combination and return return the mean value of that list.

```python
class UndergroundSystem:
    def __init__(self):
        self.currentPassengers = collections.defaultdict(set)
        self.travelTimes = collections.defaultdict(list)

    def checkIn(self, id: int, stationName: str, t: int) -> None:
        self.currentPassengers[id] = (stationName, t)

    def checkOut(self, id: int, stationName: str, t: int) -> None:
        startStation, startTime = self.currentPassengers.pop(id)
        key = f"{startStation}-{stationName}"
        self.travelTimes[key].append(t-startTime)

    def getAverageTime(self, startStation: str, endStation: str) -> float:
        key = f"{startStation}-{endStation}"
        return mean(self.travelTimes[key])

# Your UndergroundSystem object will be instantiated and called as such:
# obj = UndergroundSystem()
# obj.checkIn(id,stationName,t)
# obj.checkOut(id,stationName,t)
# param_3 = obj.getAverageTime(startStation,endStation)
```

Time Complexity: `O(1)` for each operations except getAverage, for that it's `O(n)` <br/>
Space Complexity: `O(n)`