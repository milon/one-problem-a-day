---
extends: _layouts.post
section: content
title: Gas station
problemUrl: https://leetcode.com/problems/gas-station/
date: 2022-08-08
categories: [greedy]
---

We can be greedy to solve this efficiently. First we need to check if it is possible to complete the circut by calculating the difference between total gas and total cost. If cost is higher, we immediately return -1. Else we iterate over the array, and calculate the total by substructing the cost from gas. If at any point, total dips below 0, we are sure, this is not possible from this position, so we move the pointer to the next element and repeat. Finally, we return the result array.

```python
class Solution:
    def canCompleteCircuit(self, gas: List[int], cost: List[int]) -> int:
        if sum(cost) > sum(gas):
            return -1
        
        total = 0
        result = 0
        for i in range(len(gas)):
            total += gas[i] - cost[i]
            if total < 0:
                result = i+1
                total = 0
        
        return result 
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`