---
extends: _layouts.post
section: content
title: Find the highest altitude
problemUrl: https://leetcode.com/problems/find-the-highest-altitude/
date: 2022-11-17
categories: [array-and-hashmap]
---

We will iterate over the gain array and add the gain to the current altitude. We will update the maximum altitude if the current altitude is greater than the maximum altitude.

```python
class Solution:
    def largestAltitude(self, gain: List[int]) -> int:
        maxAltitude = 0
        currentAltitude = 0
        for i in gain:
            currentAltitude += i
            maxAltitude = max(maxAltitude, currentAltitude)
        return maxAltitude
```

We can also achieve the same thing in one line code-

```python
class Solution:
    def largestAltitude(self, gain: List[int]) -> int:
        return max(0, max(accumulate(gain)))
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`