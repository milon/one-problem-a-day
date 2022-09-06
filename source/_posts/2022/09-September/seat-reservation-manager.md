---
extends: _layouts.post
section: content
title: Seat reservation manager
problemUrl: https://leetcode.com/problems/seat-reservation-manager/
date: 2022-09-06
categories: [heap]
---

We will create a min heap with the capacity of the seat manager. Then when someone reserve a seat, we will pop it from our min heap, and when someone unreserve a seat, we will push back the value to our heap.

```python
class SeatManager:
    def __init__(self, n: int):
        self.heap = [i for i in range(1, n+1)]

    def reserve(self) -> int:
        return heapq.heappop(self.heap)

    def unreserve(self, seatNumber: int) -> None:
        heapq.heappush(self.heap, seatNumber)

# Your SeatManager object will be instantiated and called as such:
# obj = SeatManager(n)
# param_1 = obj.reserve()
# obj.unreserve(seatNumber)
```

Time Complexity: `O(n)` for init, `O(1)` for rest of the operations <br/>
Space Complexity: `O(n)`