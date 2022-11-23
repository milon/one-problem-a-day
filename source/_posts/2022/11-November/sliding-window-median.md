---
extends: _layouts.post
section: content
title: Sliding window median
problemUrl: https://leetcode.com/problems/sliding-window-median/
date: 2022-11-23
categories: [sliding-window]
---

We will use a sorted list to store the numbers in the sliding window. Then, we will iterate through the list. For each number, we will find the index of the number in the sorted list. Then, we will insert the number at the index. Then, we will calculate the median. Then, we will add the median to the result. Then, we will return the result.

```python
from sortedcontainers import SortedList

class Solution:
    def medianSlidingWindow(self, nums: List[int], k: int) -> List[float]:
        medians = []
        
        sortedList = SortedList()
        i, j = 0, 0
        
        while j < len(nums):
            sortedList.add(nums[j])
            
            if j-i+1 < k: 
                j += 1
            else:
                if k % 2 == 0: 
                    medians.append((sortedList[k//2-1] + sortedList[k//2])/2)
                else:
                    medians.append(sortedList[k//2])
                
                sortedList.remove(nums[i])
                i += 1
                j += 1
        
        return medians
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`